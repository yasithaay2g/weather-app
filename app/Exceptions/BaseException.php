<?php

namespace App\Exceptions;
 
use Exception;
 
class BaseException extends Exception
{
    protected $langCode;
    
    public function __construct(int $langCode = 0, string $message = "") {
        $this->langCode = $langCode;
        $this->errorString = trans('exceptions.' . $this->langCode) . " " . $message;
    }
 
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->view(
                'exceptions.base',
                array(
                    'exception' => $this
                )
        );
    }
}