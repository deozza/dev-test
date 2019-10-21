<?php


namespace App\Controller;


use App\Entity\SuiteParams;
use App\Form\SuiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuiteController extends AbstractController
{

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route(
     *     "/api/suite",
     *     name="post_suite",
     *     methods={"POST"}
     * )
     */
    public function postSuite(Request $request)
    {
        $suite = new SuiteParams();
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(SuiteType::class, $suite);
        $response = new Response();
        $form->submit($data);

        if(!$form->isValid())
        {
            $response->setStatusCode(400);
            $response->setContent(
                json_encode([
                    'error'=>$this->convertFormToArray($form)
                ])
            );

            return $response;
        }

        $response->setStatusCode(201);

        $alreadyExist = $this->em->getRepository(SuiteParams::class)->findOneBy([
            "max"=>$suite->getMax(),
            "int1"=>$suite->getInt1(),
            "int2"=>$suite->getInt2(),
            "str1"=>$suite->getStr1(),
            "str2"=>$suite->getStr2()
        ]);

        if(!empty($alreadyExist))
        {
            $alreadyExist->setCount();
            $this->em->flush();
            $response->setContent(json_encode($alreadyExist->getResponse()));
            return $response;
        }

        $this->formatResponseOfSuite($suite);
        $this->em->persist($suite);
        $this->em->flush();

        $response->setContent(json_encode($suite->getResponse()));

        return $response;
    }

    /**
     * @Route(
     *     "/api/suites/most-asked",
     *     name="get_most_asked_suite",
     *     methods={"GET"}
     * )
     */
    public function getMostAskedSuite()
    {
        $response = new Response();
        $response->setStatusCode(200);

        return $response;
    }

    private function formatResponseOfSuite(SuiteParams $params)
    {
        $response = '';
        $i = 1;
        while($i <= $params->getMax())
        {
            $chunk = "";
            $multipleOfInt1 = $i % $params->getInt1() === 0;
            $multipleOfInt2 = $i % $params->getInt2() === 0;

            if($multipleOfInt1 === true) $chunk .= $params->getStr1();
            if($multipleOfInt2 === true) $chunk .= $params->getStr2();
            if($chunk === "") $chunk = "$i";

            $response .= "$chunk ";
            $i++;
        }

        $params->setResponse($response);
    }

    private function convertFormToArray(FormInterface $form)
    {
        $errors = array();
        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = $this->convertFormToArray($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }
        return $errors;
    }
}