<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function update(User $user, Article $article)
    {
        return $user->id === $article->id_user || in_array($user->role, ['admin', 'guru']);
    }

    public function delete(User $user, Article $article)
    {
        return $user->id === $article->id_user || in_array($user->role, ['admin', 'guru']);
    }
}