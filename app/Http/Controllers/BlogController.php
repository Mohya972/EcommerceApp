<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // afficher la liste des articles de blog publiés
    public function index()
    {
        $posts = Post::where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->get();
        
        return view('blog.index', compact('posts'));
    }

    // afficher un article de blog spécifique
    public function show(Post $post)
    {
        $comments = $post->comments()
            ->where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('blog.show', compact('post', 'comments'));
    }

    // Stocker un commentaire
    public function storeComment(Request $request, Post $post)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string|min:3',
        ]);

        $post->comments()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['content'],
            'is_approved' => false, // À modérer par l'admin
        ]);

        return redirect()->route('blog.show', $post)
            ->with('success', 'Votre commentaire a été soumis pour modération.');
    }

    // Gestion de la newsletter (exemple basique)
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        // Ici, on peut éventuellement intégrer un service comme Mailchimp
        // ou créer notre propre table de newsletters
        
        return back()->with('newsletter_success', 'Merci pour votre inscription à notre newsletter !');
    }


}
