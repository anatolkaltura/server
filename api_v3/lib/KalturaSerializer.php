<?php
/**
 * Base class for plugin serializers
 * @package api
 * @subpackage v3
 */
abstract class KalturaSerializer
{
	protected function prepareSerializedObject($object)
	{
		$object = $this->convertTypedArraysToPhpArrays($object);
		$object = $this->convertExceptionsToPhpArrays($object);
		return $object;
	}
	
	public function setHttpHeaders() {}
	
	public function serialize($object) { return ''; }
	
	protected function convertExceptionsToPhpArrays($object)
	{
	    if (is_object($object) && $object instanceof Exception)
    	{
			$error = array(
				"code" => $object->getCode(),
				"message" => $object->getMessage(),
				"objectType" => get_class($object)
			);
			
			if ( $object instanceof KalturaAPIException )
			{
				$error["args"] = $object->getArgs();
			}
			
			$object = $error;
    	}
    	else if (is_array($object)) // Support for multi-request
    	{
    		$array = array();
    		foreach($object as $item)
    		{
    			$array[] = $this->convertExceptionsToPhpArrays($item);					
    		}
			
    		$object = $array;
    	}
		
    	return $object;
	}
	
	protected function convertTypedArraysToPhpArrays($object)
	{
	    if (is_object($object))
    	{
    		if ($object instanceof KalturaTypedArray)
			{
    			return $this->convertTypedArraysToPhpArrays($object->toArray());
			}
			
			foreach($object as $key => $value)
			{
				$object->$key = $this->convertTypedArraysToPhpArrays($value);
			}
				
			return $object;
    	}
    	
    	if (is_array($object))
    	{
    		$array = array();
    		foreach($object as $item)
			{
				$array[] = $this->convertTypedArraysToPhpArrays($item);
			}
			
    		return $array;
    	}
    	
    	return $object;
	}
}
