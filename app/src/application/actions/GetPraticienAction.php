<?php

namespace toubeelib\application\actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use toubeelib\core\services\praticien\ServicePraticien;
use toubeelib\core\services\rdv\ServiceRDVInterface;
use toubeelib\application\renderer\JsonRenderer;

class GetPraticienAction extends AbstractAction{
    private ServicePraticien $servicePraticien;
    public function __construct(ServicePraticien $servicePraticien){
        $this->servicePraticien = $servicePraticien;
    }


    public function __invoke(Request $rq, Response $rs, $args): Response{
        $praticienID = $args['id'];
        $praticien = $this->servicePraticien->getPraticien($praticienID);

        $routeContext = RouteContext::fromRequest($rq);
        $routeParser = $routeContext->getRouteParser();

        $data = [
            'type' => 'ressources',
            'praticien' => $praticien,
            'links' => [
                'planning' => $routeParser->urlFor('getPraticienPlanning', ['id' => $praticien->ID]),
                'disponibility' => $routeParser->urlFor('getPraticienDisponibility', ['id' => $praticien->ID])
            ]
        ];
        return JsonRenderer::render($rs, 200, $data);
    }


}