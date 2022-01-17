<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Log\Logger;
use Illuminate\Routing\Router;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
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
        'current_password',
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

    public function render($request, Throwable $e)
    {
        Log::debug("location 1");
        if ($e instanceof TokenMismatchException)
        {

            Log::debug("location 1.5");
            return redirect()
                ->back()
                ->withInput($request->except('password'))
                ->with([
                    'message' => 'Page refreshed. Please go on.',
                    'message-type' => 'TokenMismatchException'
                ]);
        }
        if (method_exists($e, 'render') && $response = $e->render($request)) {
            Log::debug("location 2");
            return Router::toResponse($request, $response);
        } elseif ($e instanceof Responsable) {
            Log::debug("location 3");
            return $e->toResponse($request);
        }
        Log::debug($e);
        $e = $this->prepareException($this->mapException($e));

        foreach ($this->renderCallbacks as $renderCallback) {
            Log::debug("location 4");
            if (is_a($e, $this->firstClosureParameterType($renderCallback))) {
                $response = $renderCallback($e, $request);
                Log::debug("location 5");
                if (! is_null($response)) {
                    Log::debug("location 6");
                    return $response;
                }
            }
        }

        if ($e instanceof HttpResponseException) {
            Log::debug("location 7");
            return $e->getResponse();
        } elseif ($e instanceof AuthenticationException) {
            Log::debug("location 8");
            return $this->unauthenticated($request, $e);
        } elseif ($e instanceof ValidationException) {
            Log::debug("location 9");
            return $this->convertValidationExceptionToResponse($e, $request);
        }

        if ($e instanceof TokenMismatchException)
        {

            Log::debug("location 10");
            return redirect()
                ->back()
                ->withInput($request->except('password'))
                ->with([
                    'message' => 'Page refreshed. Please go on.',
                    'message-type' => 'TokenMismatchException'
                ]);
        }
        Log::debug("location 11");
        return parent::render($request, $e);
    }
}
