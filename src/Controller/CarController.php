<?php
namespace App\Controller;

use App\Entity\Car;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

Class CarController extends Controller
{
        /**
         * @Route("/Car", name="Car_list")
         * @Method({"GET"})
         */
    public function index()
    {
            $Cars=$this->getDoctrine()->getRepository(Car::class)->findAll();

       
       return $this ->render('Cars/index.html.twig', 
       array ('Cars'=>$Cars));
    }


    /**
     * @Route("/Car/new")
     * Method({"GET","POST"})
     */
    public function new(Request $request)
    {
            $Car = new Car();
            $form = $this->createFormBuilder($Car)
            ->add('Car_Make',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Car_Model',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Car_Years',IntegerType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Car_Numbers',TextType::class,array('attr'=>array('class'=>'form-control')))
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

                return $this->redirectToRoute('Car_list');

                }

                return $this->render('Cars/new.html.twig',
                array('form'=>$form->createView()
            ));
    }

     /**
     * @Route("/Car/edit/{id}")
     * Method({"GET","POST"})
     */
    public function edit(Request $request, $id)
    {
            $Car = new Car();
            $Car = $this->getDoctrine()->getRepository
            (Car::class)->find($id);

            $form = $this->createFormBuilder($Car)
            ->add('Car_Make',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Car_Model',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Car_Years',IntegerType::class,array('attr'=>array('class'=>'form-control')))
            ->add('Car_Numbers',TextType::class,array('attr'=>array('class'=>'form-control')))
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

                return $this->redirectToRoute('Car_list');

                }

                return $this->render('Cars/edit.html.twig',
                array('form'=>$form->createView()
            ));
    }

    
    /**
    * @Route("/Car/{id}")
    */

    public function show($id)
    {
        $Car = $this->getDoctrine()->getRepository
        (Car::class)->find($id);

        return $this->render('Cars/show.html.twig',array('Car'=> $Car));
    }

    /**
     * @Route("/Car/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id)
    {
        $Car = $this->getDoctrine()->getRepository
        (Car::class)->find($id);

        $entityManager = $this->getDoctrine() -> getManager();
        $entityManager -> remove($Car);
        $entityManager -> flush();

        $response = new Response();
        $response -> send();

    }


}