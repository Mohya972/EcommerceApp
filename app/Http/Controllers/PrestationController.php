<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\PrestationRequestReceived;
use App\Mail\NewRequestNotification;

class PrestationController extends Controller
{
    // Page principale des prestations
    public function index()
    {
        $services = [
            ContactRequest::SERVICE_MARIAGE => [
                'title' => 'Mariages & Cérémonies',
                'description' => 'Création de décors floraux uniques pour votre jour le plus spécial',
                'icon' => '💒',
                'image' => 'mariage.jpg',
            ],
            ContactRequest::SERVICE_ENTREPRISE => [
                'title' => 'Entreprises & Commerces',
                'description' => 'Fleurissement régulier de vos espaces professionnels',
                'icon' => '🏢',
                'image' => 'entreprise.jpg',
            ],
            ContactRequest::SERVICE_EVENEMENT => [
                'title' => 'Événementiel',
                'description' => 'Décoration florale pour tous vos événements privés ou professionnels',
                'icon' => '🎉',
                'image' => 'evenement.jpg',
            ],
            ContactRequest::SERVICE_DECORATION => [
                'title' => 'Décoration Intérieure',
                'description' => 'Compositions florales sur mesure pour embellir votre intérieur',
                'icon' => '🏠',
                'image' => 'decoration.jpg',
            ],
            ContactRequest::SERVICE_ABONNEMENT => [
                'title' => 'Abonnements Floraux',
                'description' => 'Livraison régulière de bouquets frais à domicile ou au bureau',
                'icon' => '📦',
                'image' => 'abonnement.jpg',
            ],
            ContactRequest::SERVICE_COURS => [
                'title' => 'Ateliers & Cours',
                'description' => 'Apprenez l\'art floral avec nos experts',
                'icon' => '🎨',
                'image' => 'cours.jpg',
            ],
        ];

        return view('prestations.index', compact('services'));
    }

    // Page de formulaire de contact
    public function contact($service = null)
    {
        $types = [
            ContactRequest::TYPE_PRESTATION => 'Demande de prestation',
            ContactRequest::TYPE_DEVIS => 'Demande de devis',
            ContactRequest::TYPE_EVENEMENT => 'Organisation d\'événement',
            ContactRequest::TYPE_QUESTION => 'Question générale',
        ];

        $services = [
            ContactRequest::SERVICE_MARIAGE => 'Décoration de mariage',
            ContactRequest::SERVICE_ENTREPRISE => 'Fleurissement d\'entreprise',
            ContactRequest::SERVICE_EVENEMENT => 'Événementiel',
            ContactRequest::SERVICE_DECORATION => 'Décoration intérieure',
            ContactRequest::SERVICE_ABONNEMENT => 'Abonnement floral',
            ContactRequest::SERVICE_COURS => 'Atelier/Cours de composition',
        ];

        return view('prestations.contact', compact('types', 'services', 'service'));
    }

    // Traitement du formulaire
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:prestation,devis,evenement,question',
            'service' => 'nullable|in:mariage,entreprise,evenementiel,decoration,abonnement,cours',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'entreprise' => 'nullable|string|max:255',
            'date_evenement' => 'nullable|date|after:today',
            'lieu' => 'nullable|string|max:255',
            'description' => 'required|string|min:10|max:2000',
            'budget_estime' => 'nullable|numeric|min:0',
            'consentement' => 'required|accepted',
        ]);

        // Création de la demande
        $contactRequest = ContactRequest::create($validated);

        // Envoi d'email de confirmation au client
        Mail::to($contactRequest->email)
            ->send(new PrestationRequestReceived($contactRequest));

        // Notification à l'administrateur
        Mail::to(config('mail.admin_address', 'admin@boutique-florale.com'))
            ->send(new NewRequestNotification($contactRequest));

        return redirect()->route('prestations.merci')
            ->with('request_id', $contactRequest->id)
            ->with('client_name', $contactRequest->full_name);
    }

    // Page de remerciement
    public function merci()
    {
        if (!session()->has('request_id')) {
            return redirect()->route('prestations.index');
        }

        return view('prestations.merci', [
            'request_id' => session('request_id'),
            'client_name' => session('client_name'),
        ]);
    }

    // Page pour les professionnels (B2B)
    public function professionnels()
    {
        return view('prestations.professionnels');
    }

    // FAQ pour les prestations
    public function faq()
    {
        $faqs = [
            [
                'question' => 'Combien de temps à l\'avance dois-je réserver ?',
                'reponse' => 'Pour les mariages, nous recommandons 6 à 12 mois à l\'avance. Pour les événements d\'entreprise, 1 à 3 mois. Les demandes urgentes peuvent être discutées.',
            ],
            [
                'question' => 'Proposez-vous des devis personnalisés ?',
                'reponse' => 'Oui, tous nos devis sont personnalisés selon vos besoins, votre budget et la saisonnalité des fleurs.',
            ],
            [
                'question' => 'Livrez-vous dans toute la France ?',
                'reponse' => 'Pour les événements, nous intervenons dans un rayon de 150km. Pour les abonnements, nous livrons dans toute la région.',
            ],
            [
                'question' => 'Puis-je modifier ma commande après confirmation ?',
                'reponse' => 'Les modifications sont possibles jusqu\'à 15 jours avant l\'événement, sous réserve de disponibilité.',
            ],
            [
                'question' => 'Proposez-vous la location de décors ?',
                'reponse' => 'Oui, nous proposons la location d\'arches, de structures et de décors floraux réutilisables.',
            ],
        ];

        return view('prestations.faq', compact('faqs'));
    }
}
