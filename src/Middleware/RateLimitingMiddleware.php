<?php
declare(strict_types=1);

namespace App\Middleware;

use App\DatabaseAwareTrait;
use Cake\Http\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RateLimitingMiddleware implements MiddlewareInterface
{
    use DatabaseAwareTrait;

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ) : ResponseInterface {

        $path = $request->getUri()->getPath();

        if (strpos($path, '/api') !== 0) {
            return $handler->handle($request);
        }

        /** @var \Authentication\Identity */
        $identity = $request->getAttribute('identity');
        $apiKey = $identity->get('apiKey');

        $count = $this->db()
            ->selectCollection('imageAnnotations')
            ->countDocuments(compact('apiKey'));

        if ($count > 4) {
            $response = new Response();

            return $response
                ->withStatus(429)
                ->withType('json')
                ->withStringBody(json_encode([
                    'message' => 'Free usage limit exceeded'
                ]));
        }

        return $handler->handle($request);
    }
}
