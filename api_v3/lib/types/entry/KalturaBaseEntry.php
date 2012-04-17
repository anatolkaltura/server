<?php
/**
 * @package api
 * @subpackage objects
 */
class KalturaBaseEntry extends KalturaObject implements IFilterable 
{
	/**
	 * Auto generated 10 characters alphanumeric string
	 * 
	 * @var string
	 * @readonly
	 * @filter eq,in,notin
	 */
	public $id;
	
	/**
	 * Entry name (Min 1 chars)
	 * 
	 * @var string
	 * @filter like,mlikeor,mlikeand,eq,order
	 * @requiresPermission update
	 */
	public $name;
	
	/**
	 * Entry description
	 * 
	 * @var string
	 * @requiresPermission update
	 */
	public $description;
	
	/**
	 * 
	 * 
	 * @var int
	 * @readonly
	 * @filter eq,in
	 */
	public $partnerId;
	
	/**
	 * The ID of the user who is the owner of this entry 
	 * 
	 * @var string
	 * @filter eq
	 */
	public $userId;
	
	/**
	 * The ID of the user who created this entry 
	 * 
	 * @var string
	 * @insertonly
	 * @filter eq
	 */
	public $creatorId;
	
	/**
	 * Entry tags
	 * 
	 * @var string
	 * @filter like,mlikeor,mlikeand
	 * @requiresPermission update
	 */
	public $tags;
	
	/**
	 * Entry admin tags can be updated only by administrators
	 * 
	 * @var string
	 * @filter like,mlikeor,mlikeand
	 */
	public $adminTags;
	
	/**
	 * 
	 * @var string
	 * @filter matchand, matchor
	 * @requiresPermission insert,update
	 */
	public $categories;
	
	/**
	 * 
	 * @var string
	 * @filter matchand, matchor
	 * @requiresPermission insert,update
	 */
	public $categoriesIds;
	
	/**
	 * 
	 * @var KalturaEntryStatus
	 * @readonly
	 * @filter eq,not,in,notin
	 */
	public $status;
	
	/**
	 * Entry moderation status
	 * 
	 * @var KalturaEntryModerationStatus
	 * @readonly
	 * @filter eq,not,in,notin
	 */
	public $moderationStatus;
	
	/**
	 * Number of moderation requests waiting for this entry
	 * 
	 * @var int
	 * @readonly
	 * @filter order
	 */
	public $moderationCount;
	
	/**
	 * The type of the entry, this is auto filled by the derived entry object
	 * 
	 * @var KalturaEntryType
	 * @filter eq,in
	 */
	public $type;
	
	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 * 
	 * @var int
	 * @readonly
	 * @filter gte,lte,order
	 */
	public $createdAt;
	
	/**
	 * Entry update date as Unix timestamp (In seconds)
	 * 
	 * @var int
	 * @readonly
	 * @filter gte,lte,order
	 */
	public $updatedAt;
	
	/**
	 * Calculated rank
	 * 
	 * @var float
	 * @readonly
	 * @filter order
	 */
	public $rank;
	
	/**
	 * The total (sum) of all votes
	 * 
	 * @var int
	 * @readonly
	 * @filter lte,gte,order
	 */
	public $totalRank;
	
	/**
	 * Number of votes
	 *  
	 * @var int
	 * @readonly
	 */
	public $votes;
	
	/**
	 * 
	 * @var int
	 * @filter eq
	 */
	public $groupId;
	
	/**
	 * Can be used to store various partner related data as a string 
	 * 
	 * @var string
	 */
	public $partnerData;
	
	/**
	 * Download URL for the entry
	 * 
	 * @var string
	 * @readonly
	 */
	public $downloadUrl;
	
	/**
	 * Indexed search text for full text search
	 * @var string
	 * @readonly
	 * @filter matchand, matchor
	 */
	public $searchText;
	
	/**
	 * License type used for this entry
	 * 
	 * @var KalturaLicenseType
	 */
	public $licenseType;
	
	/**
	 * Version of the entry data
	 *
	 * @var int
	 * @readonly
	 */
	public $version;
	
	/**
	 * Thumbnail URL
	 * 
	 * @var string
	 * @insertonly
	 */
	public $thumbnailUrl;
	
	/**
	 * The Access Control ID assigned to this entry (null when not set, send -1 to remove)  
	 * 
	 * @var int
	 * @filter eq,in
	 * @requiresPermission insert,update
	 */
	public $accessControlId;
	
	/**
	 * Entry scheduling start date (null when not set, send -1 to remove)
	 *  
	 * @var int
	 * @filter gte,lte,gteornull,lteornull,order
	 * @requiresPermission insert,update
	 */
	public $startDate;
	
	/**
	 * Entry scheduling end date (null when not set, send -1 to remove)
	 * 
	 * @var int
	 * @filter gte,lte,gteornull,lteornull,order
	 * @requiresPermission insert,update
	 */
	public $endDate;
	
	/**
	 * Entry external reference id
	 * 
	 * @var string
	 * @filter eq,in
	 * @requiresPermission insert,update
	 */
	public $referenceId;
	
	/**
	 * ID of temporary entry that will replace this entry when it's approved and ready for replacement
	 * 
	 * @var string
	 * @filter eq,in
	 * @readonly
	 */
	public $replacingEntryId;
	
	/**
	 * ID of the entry that will be replaced when the replacement approved and this entry is ready
	 * 
	 * @var string
	 * @filter eq,in
	 * @readonly
	 */
	public $replacedEntryId;
	
	/**
	 * Status of the replacement readiness and approval
	 * 
	 * @var KalturaEntryReplacementStatus
	 * @filter eq,in
	 * @readonly
	 */
	public $replacementStatus;
	
	/**
	 * Can be used to store various partner related data as a numeric value
	 * 
	 * @var int
	 * @filter gte,lte,order
	 */
	public $partnerSortValue;
	
	/**
	 * Override the default ingestion profile  
	 * 
	 * @var int
	 */
	public $conversionProfileId;
	
	/**
	 * ID of source root entry, used for clipped, skipped and cropped entries that created from another entry  
	 * 
	 * @var string
	 * @filter eq,in
	 * @readonly
	 */
	public $rootEntryId;
	
	/**
	 * clipping, skipping and cropping attributes that used to create this entry  
	 * 
	 * @var KalturaOperationAttributesArray
	 */
	public $operationAttributes;
	
	/**
	 * list of user ids that are entitled to edit the entry (no server enforcement) The difference between entitledUsersEdit and entitledUsersPublish is applicative only
	 * 
	 * @var string
	 */
	//TODO add php doc after permission deployment - @requiresPermission insert,update
	public $entitledUsersEdit;
		
	/**
	 * list of user ids that are entitled to publish the entry (no server enforcement) The difference between entitledUsersEdit and entitledUsersPublish is applicative only
	 * 
	 * @var string
	 */
	//TODO add php doc after permission deployment - @requiresPermission insert,update
	public $entitledUsersPublish;	
	
	/*
	 * mapping between the field on this object (on the left) and the setter/getter on the entry object (on the right)  
	 */
	private static $map_between_objects = array 
	 (
	 	"id", 
	 	"name", 
	 	"description",
	 	"userId" => "puserId", // what should be extracted is only the puserId NOT kuserId
	 	"creatorId" => "creatorPuserId",
	 	"tags",
	 	"adminTags",
	 	"partnerId",
	 	"moderationStatus",
	 	"moderationCount",
	 	"status", 
	 	"type", // this will need to be set according to the class
	 	"createdAt", 
	 	"updatedAt", 
	 	"rank" => "rankAsFloat", 
	 	"totalRank",
	 	"votes",
	 	"groupId",
	 	"partnerData", 
	 	"downloadUrl",
	 	"licenseType",
	 	"searchText",
	 	"version",
	 	"thumbnailUrl",
	 	"accessControlId",
	 	"startDate",
	 	"endDate",
	 	"referenceId",
		"replacingEntryId",
		"replacedEntryId",
		"replacementStatus",
		"partnerSortValue",
	 	"categories",
	 	"categoriesIds",
	 	"conversionProfileId" => "conversionQuality",
	 	"rootEntryId",
	 	"entitledUsersEdit" => "entitledPusersEdit",
	 	"entitledUsersPublish" => "entitledPusersPublish"
	 );
		 
	public function getMapBetweenObjects()
	{
		return array_merge(parent::getMapBetweenObjects(), self::$map_between_objects);
	}
	
	public function toObject($dbObject = null, $skip = array())
	{
		if (is_null($dbObject))
		{
			KalturaLog::debug("Creating new entry");
			$dbObject = new entry();
		}
		
		parent::toObject($dbObject, $skip);
		
		if ($this->startDate === -1) // save -1 as null
			$dbObject->setStartDate(null);
			
		if ($this->endDate === -1) // save -1 as null
			$dbObject->setEndDate(null);
			
		
		if ($this->categoriesIds !== null && $this->categories === null)
		{
			$catsNames = array ();
			
			$cats = explode(",", $this->categoriesIds);
			
			foreach ($cats as $cat)
			{ 
				$catName = categoryPeer::retrieveByPK($cat);
				if (!is_null($catName))
					$catsNames[] = $catName->getFullName();
				else
				{
					throw new KalturaAPIException(KalturaErrors::CANT_UPDATE_PARAMETER, $cat);
				}
			}
			
			$catNames = implode(",", $catsNames);
			$dbObject->setCategories($catNames);
		}
			
		return $dbObject;
	}
	
	public function fromObject($sourceObject)
	{
		if(!$sourceObject)
			return;
			
		parent::fromObject($sourceObject);
		
		$this->startDate = $sourceObject->getStartDate(null);
		$this->endDate = $sourceObject->getEndDate(null);
		$this->operationAttributes = KalturaOperationAttributesArray::fromOperationAttributesArray($sourceObject->getOperationAttributes());
		
		if (implode(',', kEntitlementUtils::getKsPrivacyContext()) != kEntitlementUtils::DEFAULT_CONTEXT)
		{
			$this->categories = null;
			$this->categoriesIds = null;
		}
	}
	
	public function validateObjectsExist()
	{
		if(!is_null($this->conversionProfileId) && $this->conversionProfileId != conversionProfile2::CONVERSION_PROFILE_NONE)
		{
			$conversionProfile = conversionProfile2Peer::retrieveByPK($this->conversionProfileId);
			if(!$conversionProfile)
				throw new KalturaAPIException(KalturaErrors::CONVERSION_PROFILE_ID_NOT_FOUND, $this->conversionProfileId);
		}
	
		if(!is_null($this->accessControlId))
		{
			$accessControlProfile = accessControlPeer::retrieveByPK($this->accessControlId);
			if(!$accessControlProfile)
				throw new KalturaAPIException(KalturaErrors::ACCESS_CONTROL_ID_NOT_FOUND, $this->accessControlId);
		}
	}
	
	/* (non-PHPdoc)
	 * @see KalturaObject::validateForInsert()
	 */
	public function validateForInsert($propertiesToSkip = array())
	{
		$this->validateCategories();
		$this->validatePropertyMinLength('referenceId', 2, true);
		$this->validateObjectsExist();
		
		return parent::validateForInsert($propertiesToSkip);
	}
	
	/*
	 * To validate if user is entitled to the category � all needed is to select from the db.
	 */
	public function validateCategories()
	{
		if (implode(',', kEntitlementUtils::getKsPrivacyContext()) != kEntitlementUtils::DEFAULT_CONTEXT && 
			($this->categoriesIds != null || $this->categories != null))
			throw new KalturaAPIException(KalturaErrors::ENTRY_CATEGORY_FIELD_IS_DEPRECATED);
			
		if ($this->categoriesIds != null)
		{
			$catsNames = array ();
			
			$cats = explode(",", $this->categoriesIds);
			
			foreach ($cats as $cat)
			{ 
				$catName = categoryPeer::retrieveByPK($cat);
				if (is_null($catName))
					throw new KalturaAPIException(KalturaErrors::CANT_UPDATE_PARAMETER, $cat);
			}
		}
		
		if ($this->categories != null)
		{
			$catsNames = array ();
			
			$cats = explode(",", $this->categoriesIds);
			
			foreach ($cats as $cat)
			{ 
				$catName = categoryPeer::retrieveByPK($cat);
				if (is_null($catName))
				{
					$enableEntit = false;
					if (KalturaCriterion::isTagEnable(KalturaCriterion::TAG_ENTITLEMENT_CATEGORY))
					{
						KalturaCriterion::disableTag(KalturaCriterion::TAG_ENTITLEMENT_CATEGORY);
						$enableEntit = true;
					}

					$catName = categoryPeer::retrieveByPK($cat);
					if ($catName)
						throw new KalturaAPIException(KalturaErrors::CANT_UPDATE_PARAMETER, $cat);
							
					if($enableEntit)
						KalturaCriterion::enableTag(KalturaCriterion::TAG_ENTITLEMENT_CATEGORY);
				}
			}
		}
	}
	
	/* (non-PHPdoc)
	 * @see KalturaObject::validateForUpdate($source_object)
	 */
	public function validateForUpdate($sourceObject, $propertiesToSkip = array())
	{
		$this->validateCategories();
		$this->validatePropertyMinLength('referenceId', 2, true);
		
		if(!is_null($this->conversionProfileId) && $sourceObject->getStatus() != entryStatus::NO_CONTENT)
			throw new KalturaAPIException(KalturaErrors::PROPERTY_VALIDATION_ENTRY_STATUS, $this->getFormattedPropertyNameWithClassName('conversionProfileId'), $sourceObject->getStatus());
				
		$this->validateObjectsExist();
		
		return parent::validateForUpdate($sourceObject, $propertiesToSkip);
	}
	
	public function getExtraFilters()
	{
		return array(
			array("filter" => "mlikeor", "fields" => array("tags", "name")),
			array("filter" => "mlikeor", "fields" => array("tags", "adminTags")),
			array("filter" => "mlikeor", "fields" => array("tags", "adminTags", "name")),
			array("filter" => "mlikeand", "fields" => array("tags", "name")),
			array("filter" => "mlikeand", "fields" => array("tags", "adminTags")),
			array("filter" => "mlikeand", "fields" => array("tags", "adminTags", "name")),
			array("order" => "recent"),
		);
	}
	
	public function getFilterDocs()
	{
		return array(
			"idEqual" => "This filter should be in use for retrieving only a specific entry (identified by its entryId).",
			"idIn" => "This filter should be in use for retrieving few specific entries (string should include comma separated list of entryId strings).",
			"userIdEqual" => "This filter parameter should be in use for retrieving only entries, uploaded by/assigned to a specific user (identified by user Id).",
			"typeIn" => "This filter should be in use for retrieving entries of few {@link ?object=KalturaEntryType KalturaEntryType} (string should include a comma separated list of {@link ?object=KalturaEntryType KalturaEntryType} enumerated parameters).",
			
			"statusEqual" => "This filter should be in use for retrieving only entries, at a specific {@link ?object=KalturaEntryStatus KalturaEntryStatus}.",
			"statusIn" => "This filter should be in use for retrieving only entries, at few specific {@link ?object=KalturaEntryStatus KalturaEntryStatus} (comma separated).",
			"statusNotEqual" => "This filter should be in use for retrieving only entries, not at a specific {@link ?object=KalturaEntryStatus KalturaEntryStatus}.",
			"statusNotIn" => "This filter should be in use for retrieving only entries, not at few specific {@link ?object=KalturaEntryStatus KalturaEntryStatus} (comma separated).",
			
			"nameLike" => "This filter should be in use for retrieving specific entries. It should include only one string to search for in entry names (no wildcards, spaces are treated as part of the string).",
			"nameMultiLikeOr" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry names, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).",
			"nameMultiLikeAnd" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry names, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).",
			"nameEqual" => "This filter should be in use for retrieving entries with a specific name.",
		
			"tagsLike" => "This filter should be in use for retrieving specific entries. It should include only one string to search for in entry tags (no wildcards, spaces are treated as part of the string).",
			"tagsMultiLikeOr" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).",
			"tagsMultiLikeAnd" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).",
		
			"adminTagsLike" => "This filter should be in use for retrieving specific entries. It should include only one string to search for in entry tags set by an ADMIN user (no wildcards, spaces are treated as part of the string).",
			"adminTagsMultiLikeOr" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).",
			"adminTagsMultiLikeAnd" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).",
			
			"createdAtGreaterThanOrEqual" => "This filter parameter should be in use for retrieving only entries which were created at Kaltura system after a specific time/date (standard timestamp format).",
			"createdAtLessThanOrEqual" => "This filter parameter should be in use for retrieving only entries which were created at Kaltura system before a specific time/date (standard timestamp format).",
			
			"updatedAtGreaterThanEqual" => "This filter parameter should be in use for retrieving only entries which were created at Kaltura system after or at an exact time/date (standard timestamp format).",
			"updatedAtLessThenEqual" => "This filter parameter should be in use for retrieving only entries which were created at Kaltura system before or at an exact time/date (standard timestamp format).",
			
			"modifiedAtGreaterThanEqual" => "This filter parameter should be in use for retrieving only entries which were updated at Kaltura system after or at an exact time/date (standard timestamp format).",
			"modifiedAtLessThenEqual" => "This filter parameter should be in use for retrieving only entries which were updated at Kaltura system before or at an exact time/date (standard timestamp format).",
		
			"partnerIdEqual" => "This filter should be in use for retrieving only entries which were uploaded by/assigned to users of a specific Kaltura Partner (identified by Partner ID).",
			"partnerIdIn" => "This filter should be in use for retrieving only entries within Kaltura network which were uploaded by/assigned to users of few Kaltura Partners  (string should include comma separated list of PartnerIDs)",
			
			"tagsAndNameMultiLikeOr" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags and names, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).",
			"tagsAndNameMultiLikeAnd" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags and names, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).",
		
			"tagsAndAdminTagsMultiLikeOr" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags set by both users and ADMIN users, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).",
			"tagsAndAdminTagsAndNameMultiLikeOr" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags set by both users and ADMIN users and in entry names, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).",
			
			"tagsAndAdminTagsMultiLikeAnd" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by both users and ADMIN users, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).",
			"tagsAndAdminTagsAndNameMultiLikeAnd" => "This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by both users and ADMIN users, and in entry names, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).",
			
			"searchTextMatchAnd" => "This filter should be in use for retrieving specific entries while search match the input string within all of the following metadata attributes: name, description, tags, adminTags.",
			"searchTextMatchOr" => "This filter should be in use for retrieving specific entries while search match the input string within at least one of the following metadata attributes: name, description, tags, adminTags.",
		);
	}
}