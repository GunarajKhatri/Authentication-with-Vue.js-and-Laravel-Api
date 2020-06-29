<?php
namespace App\Exceptions;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait
{
	public function apiException($request,$excp){
		if($excp instanceof ModelNotFoundException){
			return response()->json([
				'error'=>'No model found'
			],Response::HTTP_NOT_FOUND);
		}
		if($excp instanceof NotFoundHttpException){
			return response()->json([
				'error'=>'No such route found'
			],Response::HTTP_NOT_FOUND);
		}
	}
}