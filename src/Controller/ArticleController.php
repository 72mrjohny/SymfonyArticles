<?php
    namespace App\Controller;

    use App\Entity\Article;

    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class ArticleController extends Controller{
        /**
         * @Route("/", name="article_list")
         * @Method({"GET"})
         */
        public function index() {
            // return new Response('
            //     <html>
            //         <body>
            //             Hello World!
            //         </body>
            //     </html>
            //     ');

            $articles= $this->getDoctrine()->getRepository(Article::class)->findAll();

            return $this->render('articles/index.html.twig', array('articles'=> $articles));
        }

        // /**
        //  * @Route("/article/{id}", name="article_show")
        //  */
        public function show($id) {
            $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
            return $this->render('articles/show.html.twig', array('article' => $article));
        }


        // /**
        //  * @Route("/article/save")
        //  */
        // public function save() {
        //     $entityManager = $this->getDoctrine()->getManager();

        //     $article = new Article();
        //     $article->setTitle('Article Two');
        //     $article->setBody('Saved body for article two');

        //     $entityManager->persist($article);

        //     $entityManager->flush();

        //     return new Response('Saves an article with the id of '.$article->getId());
        // }



    }