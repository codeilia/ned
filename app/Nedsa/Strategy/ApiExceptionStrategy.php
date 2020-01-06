<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 30/06/2018
 * Time: 01:56 AM
 */

namespace App\Nedsa\Strategy;

use App\Nedsa\Respondable;
use Exception;
//use App\Vamyar\Contracts\HandlesGenericStrategy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use League\OAuth2\Server\Exception\OAuthServerException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiExceptionStrategy
{
    use Respondable;

    public function handle(Exception $exception)
    {
        if ($exception instanceof AuthenticationException)
            return $this->respondNotAuthorized();

        if ($exception instanceof AuthorizationException)
            return $this->respondForbidden();

        if ($exception instanceof ModelNotFoundException)
            return $this->respondNotFound();

        if ($exception instanceof NotFoundHttpException)
            return $this->respondNotFound();

        if ($exception instanceof ValidationException) {
            $errors = $exception->errors();
            $result = [];
            foreach ($errors as $key => $value) {
                $result[$key] = $value[0];
            }

            return $this->respondValidationFailed($message = $result);
        }

        if ($exception instanceof \ErrorException)
            return $this->respondInternalError();
    }
}
