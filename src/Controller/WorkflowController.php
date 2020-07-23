<?php


namespace App\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\BlogPost;
use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\Workflow\Registry;

class WorkflowController extends AbstractController
{
    private $workflowRegistry;

    public function __construct(Registry $workflowRegistry)
    {
        $this->workflowRegistry = $workflowRegistry;
    }

    /**
     * @Route("/workflow", name="workflow")
     */
    public function toReview(BlogPost $post)
    {
        $workflow = $this->workflowRegistry->get($post);

        // Update the currentState on the post
        try {
            $workflow->apply($post, 'to_review');
        } catch (LogicException $exception) {
            // ...
        }

        return $this->render('workflow.html.twig');
    }

}