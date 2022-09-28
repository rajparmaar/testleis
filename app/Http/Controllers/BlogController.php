<?php

namespace App\Http\Controllers;

use App\Entity\Blog;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;

class BlogController extends Controller
{
    public function getAdd()
    {
        return view('add');
    }

    public function postAdd(Request $request, EntityManagerInterface $em)
    {
        $blog = new Blog(
            $request->get('name'),
            $request->get('description')
        );

        $em->persist($blog);
        $em->flush();

        return redirect('/blogs')->with('success_message', 'Blog added successfully!');
    }

    public function getIndex(EntityManagerInterface $em)
    {
        $blogs = $em->getRepository(Blog::class)->findAll();

        return view('blogs', [
            'blogs' => $blogs
        ]);
    }

    public function getToggle(EntityManagerInterface $em, $blogId)
    {
        /* @var blog $blog */
        $blog = $em->getRepository(Blog::class)->find($blogId);

        $blog->toggleStatus();
        $newStatus = ($blog->status()) ? 'done' : 'not done';

        $em->flush();

        return redirect('/blogs')->with('success_message', 'Blog successfully marked as ' . $newStatus);
    }

    public function getDelete(EntityManagerInterface $em, $blogId)
    {
        // dd('in');
        $blog = $em->getRepository(Blog::class)->find($blogId);
        // dd($blog);

        $em->remove($blog);
        $em->flush();

        // dd($blog);

        return redirect('/blogs')->with('success_message', 'Blog successfully removed.');
    }

    public function getEdit(EntityManagerInterface $em, $blogId)
    {
        $blog = $em->getRepository(Blog::class)->find($blogId);

        return view('edit', [
            'blog' => $blog
        ]);
    }

    public function postEdit(Request $request, EntityManagerInterface $em, $blogId)
    {
        /* @var blog $blog */
        $blog = $em->getRepository(Blog::class)->find($blogId);

        $blog->setName($request->get('name'));
        $blog->setDescription($request->get('description'));

        $em->flush();

        return redirect('blogs')->with('success_message', 'Blog modified successfully.');
    }
}
