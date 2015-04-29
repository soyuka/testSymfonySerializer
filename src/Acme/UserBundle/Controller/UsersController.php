<?php
namespace Acme\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Acme\UserBundle\Entity\User;

use FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Request\ParamFetcherInterface,
    FOS\RestBundle\Util\Codes,
    FOS\RestBundle\Controller\FOSRestController;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * @Rest\RouteResource("User")
 * @Rest\NamePrefix("api_user_")
 */
class UsersController extends FOSRestController
{
    /**
     * Returns a list of users
     *
     * @ApiDoc(
     *  resource = true,
     *  description = "Get a list of users",
     *  output = "Acme\UserBundle\Entity\User"
     * )
     *
     *
     * @Rest\View(serializerGroups={"public"})
     *
     * @param Request $request
     * @param ParamFetcherInterface $paramFetcher
     *
     * @return array
     */
    public function cgetAction(Request $request, ParamFetcherInterface $paramFetcher = null)
    {
        return $this->container->get('fos_user.user_manager')->findUsers();
    }

    /**
     * Get a single user
     *
     * @ApiDoc(
     *  resource = true,
     *  description = "Get a specific user by id",
     *  output = "Acme\UserBundle\Entity\User",
     *  statusCodes = {
     *      200 = "Returned when successful",
     *      404 = "Returned when the page is not found"
     *   }
     * )
     *
     * @Rest\View()
     *
     * @param int $id
     *
     * @return array
     *
     */
    public function getAction($id)
    {
        return $this->container->get('fos_user.user_manager')->findUserBy(['id' => $id]);
    }

}

