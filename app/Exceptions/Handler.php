<?php

namespace App\Exceptions;

use App\Exceptions\Business\InvalidLoginOrPassword;
use App\Exceptions\Business\BusinessException;
use App\Http\Resources\ErrorResource;
use App\Http\Responses\ApiResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        $code = $this->detectStatusCode($exception);
        return ApiResponse::error(
            new ErrorResource(
                new BusinessException($exception->getMessage(), $code)
            ),
            $code
        );
    }

    /**
     * @param Throwable $exception
     * @return int
     */
    private function detectStatusCode(Throwable $exception): int
    {
        $responses = [
            NotFoundHttpException::class => Response::HTTP_NOT_FOUND,
            MethodNotAllowedHttpException::class => Response::HTTP_METHOD_NOT_ALLOWED,
            InvalidTokenException::class => Response::HTTP_BAD_REQUEST,
            AuthenticationException::class => Response::HTTP_FORBIDDEN,
            InvalidLoginOrPassword::class => Response::HTTP_UNAUTHORIZED,
        ];

        foreach ($responses as $error => $response) {
            if ($exception instanceof $error) {
                return $response;
            }
        }

        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = $exception->getCode() === 0 ?
                Response::HTTP_INTERNAL_SERVER_ERROR :
                $exception->getCode();
        }

        return $statusCode;
    }

}
