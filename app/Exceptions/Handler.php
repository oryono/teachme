<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;
use Symfony\Component\Debug\Exception\FlattenException;

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
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }


    protected function convertExceptionToResponse(Exception $e)
    {
        if (App::environment('production'))
        {
            $e = FlattenException::create($e);
            // Just return a basic view. We could use the exception variable we are passing to our view to style the stack trace but why bother? We probably don't want to show that to the user on a live environment anyway.
            return response()->view('errors.500', ['exception' => $e], $e->getStatusCode(), $e->getHeaders());
        }

        // If we're on the dev environment then do nothing special, just show the usual error page with stack trace.
        return parent::convertExceptionToResponse($e);
    }
}
