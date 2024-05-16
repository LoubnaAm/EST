<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\CommentReaction;
use Illuminate\Support\Facades\DB;





class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'rating' => 'required|integer',
            'opinion' => 'required|string',
        ]);

        // Enregistrement des données dans la base de données
        Commentaire::create([
            'user_id' => auth()->id(), // Si vous avez un système d'authentification
            'rating' => $request->rating,
            'content' => $request->opinion,
            'published_at' => now(), // Date et heure actuelles

        ]);

        // Redirection
        return redirect()->back()->with('success', 'Your comment has been submitted successfully.');    }

    public function index()
{
    // Récupérer tous les commentaires depuis la base de données
    $commentaires = Commentaire::all();
    // Calculer le nombre total de toutes les évaluations
    $totalRatings = Commentaire::count('rating');

        // Calculer le nombre total de chaque évaluation
    $ratingsCounts = Commentaire::select('rating', DB::raw('COUNT(*) as total'))
            ->groupBy('rating')
            ->pluck('total', 'rating');

    // Passer les commentaires à la vue
    return view('dashboard', ['commentaires' => $commentaires]);

}


public function likeComment($id)
{
    $commentaire = Commentaire::findOrFail($id);
    $user_id = auth()->id();

    // Vérifie si l'utilisateur a déjà réagi au commentaire
    $existingReaction = $commentaire->reactions()->where('user_id', $user_id)->first();

    if ($existingReaction && $existingReaction->reaction === 'like') {
        // Si l'utilisateur a déjà réagi et sa réaction est "like", supprimez sa réaction
        $existingReaction->delete();
        $commentaire->likes--;
    } else {
        // Ajoutez la réaction de like
        $commentaire->reactions()->updateOrCreate(
            ['user_id' => $user_id],
            ['reaction' => 'like']
        );
        $commentaire->likes++;
        
        // Si l'utilisateur avait déjà réagi avec "dislike", décrémentez le nombre de dislikes
        if ($existingReaction && $existingReaction->reaction === 'dislike') {
            $commentaire->dislikes--;
        }
    }

    $commentaire->save();

    return redirect()->back();
}

public function dislikeComment($id)
{
    $commentaire = Commentaire::findOrFail($id);
    $user_id = auth()->id();

    // Vérifie si l'utilisateur a déjà réagi au commentaire
    $existingReaction = $commentaire->reactions()->where('user_id', $user_id)->first();

    if ($existingReaction && $existingReaction->reaction === 'dislike') {
        // Si l'utilisateur a déjà réagi et sa réaction est "dislike", supprimez sa réaction
        $existingReaction->delete();
        $commentaire->dislikes--;
    } else {
        // Ajoutez la réaction de dislike
        $commentaire->reactions()->updateOrCreate(
            ['user_id' => $user_id],
            ['reaction' => 'dislike']
        );
        $commentaire->dislikes++;
        
        // Si l'utilisateur avait déjà réagi avec "like", décrémentez le nombre de likes
        if ($existingReaction && $existingReaction->reaction === 'like') {
            $commentaire->likes--;
        }
    }

    $commentaire->save();

    return redirect()->back();
}
}