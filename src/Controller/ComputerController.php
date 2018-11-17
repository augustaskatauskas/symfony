<?php
namespace App\Controller;

use App\Entity\Computer;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

Class ComputerController extends Controller
{
        /**
         * @Route("/Computer", name="Computer_list")
         * @Method({"GET"})
         */
    public function index()
    {
            $Computers=$this->getDoctrine()->getRepository(Computer::class)->findAll();

       
       return $this ->render('Computers/index.html.twig', 
       array ('Computers'=>$Computers));
    }


    /**
     * @Route("/Computer/new")
     * Method({"GET","POST"})
     */
    public function new(Request $request)
    {
            $Computer = new Computer();
            $form = $this->createFormBuilder($Computer)
            ->add('Computer_Make',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Computer_Model',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Computer_Years',IntegerType::class,array('attr'=>array('class'=>'form-control')))
            ->add('save',SubmitType::class,array(
                    'label'=>'Create',
                    'attr'=>array('class'=>'btn btn-primary mt-3')
            ))
            ->getForm();

                $form->handleRequest($request);

                if($form -> isSubmitted() && $form->isValid())
                {
                $Computer = $form -> getData();

                $entityManager = $this->getDoctrine() -> getManager();
                $entityManager -> persist($Computer);
                $entityManager -> flush();

                return $this->redirectToRoute('Computer_list');

                }

                return $this->render('Computers/new.html.twig',
                array('form'=>$form->createView()
            ));
    }

     /**
     * @Route("/Computer/edit/{id}")
     * Method({"GET","POST"})
     */
    public function edit(Request $request, $id)
    {
            $Computer = new Computer();
            $Computer = $this->getDoctrine()->getRepository
            (Computer::class)->find($id);

            $form = $this->createFormBuilder($Computer)
            ->add('Computer_Make',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Computer_Model',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Computer_Years',IntegerType::class,array('attr'=>array('class'=>'form-control')))
            ->add('save',SubmitType::class,array(
                    'label'=>'Create',
                    'attr'=>array('class'=>'btn btn-primary mt-3')
            ))
            ->getForm();

                $form->handleRequest($request);

                if($form -> isSubmitted() && $form->isValid())
                {

                $entityManager = $this->getDoctrine() -> getManager();
                $entityManager -> flush();

                return $this->redirectToRoute('Computer_list');

                }

                return $this->render('Computers/edit.html.twig',
                array('form'=>$form->createView()
            ));
    }

    
    /**
    * @Route("/Computer/{id}")
    */

    public function show($id)
    {
        $Computer = $this->getDoctrine()->getRepository
        (Computer::class)->find($id);

        return $this->render('Computers/show.html.twig',array('Computer'=> $Computer));
    }

    /**
     * @Route("/Computer/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id)
    {
        $Computer = $this->getDoctrine()->getRepository
        (Computer::class)->find($id);

        $entityManager = $this->getDoctrine() -> getManager();
        $entityManager -> remove($Computer);
        $entityManager -> flush();

        $response = new Response();
        $response -> send();

    }


}