<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class CustomException extends Exception
{
        /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }
 
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render(NotFoundHttpException $e,$request)
    {
         //dd($request);
         if($request->is('api/*')){
            return response()->json(["error"=>"object deson't exist to ".$request->method()],404);
        }
    }
}
