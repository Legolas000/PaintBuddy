<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if($e instanceof DBException)
        {
            return Redirect::to('/dbExcp');
        }
        if($e instanceof IMAPException)
        {
            return Redirect::to('/imapExcp');
        }
        if($e instanceof SendMailException)
        {
            return Redirect::to('/smailExcp');
        }

        if ($this->isHttpException($e)) {
            return $this->renderHttpExceptionView($e);
        }

        if (config('app.debug')) {
            return $this->renderExceptionWithWhoops($e);
        }

        return parent::render($request, $e);
    }


    /**
     * Render an exception using Whoops.
     *
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    protected function renderExceptionWithWhoops(Exception $e)
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());

        return new \Illuminate\Http\Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }

    /**
     * Render the error view that best fits that status code.
     *
     * @param Exception $e
     * @return \Illuminate\Http\Response
     */
    public function renderHttpExceptionView(Exception $e)
    {
        $package = 'cms'; //@todo - allow for custom CMS packages and themes
        $status = $e->getStatusCode();
        if (!view()->exists($package."::errors.".$status)) {
            $status = 'default';
        }
        return response()->view($package."::errors.".$status, ['exception' => $e], $status);
    }
}
