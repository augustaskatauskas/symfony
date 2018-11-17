<?php
namespace App\Controller;

use App\Entity\Phone;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

Class PhoneController extends Controller
{
        /**
         * @Route("/Phone", name="Phone_list")
         * @Method({"GET"})
         */
    public function index()
    {
            $Phones=$this->getDoctrine()->getRepository(Phone::class)->findAll();

       
       return $this ->render('Phones/index.html.twig', 
       array ('Phones'=>$Phones));
    }


    /**
     * @Route("/Phone/new")
     * Method({"GET","POST"})
     */
    public function new(Request $request)
    {
            $Phone = new Phone();
            $form = $this->createFormBuilder($Phone)
            ->add('Phone_Make',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Phone_Model',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Phone_Years',IntegerType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Phone_IMEI',IntegerType::class,array('attr'=>array('class'=>'form-control')))
            ->add('save',SubmitType::class,array(
                    'label'=>'Create',
                    'attr'=>array('class'=>'btn btn-primary mt-3')
            ))
            ->getForm();

                $form->handleRequest($request);

                if($form -> isSubmitted() && $form->isValid())
                {
                $Car = $form -> getData();

                $entityManager = $this->getDoctrine() -> getManager();
                $entityManager -> persist($Car);
                $entityManager -> flush();

                return $this->redirectToRoute('Phone_list');

                }

                return $this->render('Phones/new.html.twig',
                array('form'=>$form->createView()
            ));
    }

     /**
     * @Route("/Phone/edit/{id}")
     * Method({"GET","POST"})
     */
    public function edit(Request $request, $id)
    {
            $Phone = new Phone();
            $Phone = $this->getDoctrine()->getRepository
            (Phone::class)->find($id);

            $form = $this->createFormBuilder($Phone)
            ->add('Phone_Make',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Phone_Model',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Phone_Years',IntegerType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Phone_IMEI',IntegerType::class,array('attr'=>array('class'=>'form-control')))
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

                return $this->redirectToRoute('Phone_list');

                }

                return $this->render('Phones/edit.html.twig',
                array('form'=>$form->createView()
            ));
    }

    
    /**
    * @Route("/Phone/{id}")
    */

    public function show($id)
    {
        $Phone = $this->getDoctrine()->getRepository
        (Phone::class)->find($id);

        return $this->render('Phones/show.html.twig',array('Phone'=> $Phone));
    }

    /**
     * @Route("/Phone/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id)
    {
        $Phone = $this->getDoctrine()->getRepository
        (Phone::class)->find($id);

        $entityManager = $this->getDoctrine() -> getManager();
        $entityManager -> remove($Phone);
        $entityManager -> flush();

        $response = new Response();
        $response -> send();

    }


}