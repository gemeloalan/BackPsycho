<?php

namespace App;

trait ApiResponse
{
    protected function successResponse($resource, $data, $code)
	{
		return response()->json(['success' => true, $resource => $data], $code);
	}
    protected function errorResponse($message, $code)
	{
		return response()->json(['success' => false, 'error' => $message, 'code' => $code], $code);
	}
}
