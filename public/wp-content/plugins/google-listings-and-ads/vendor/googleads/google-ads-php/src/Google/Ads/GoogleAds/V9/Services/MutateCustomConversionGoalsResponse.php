<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v9/services/custom_conversion_goal_service.proto

namespace Google\Ads\GoogleAds\V9\Services;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for a custom conversion goal mutate.
 *
 * Generated from protobuf message <code>google.ads.googleads.v9.services.MutateCustomConversionGoalsResponse</code>
 */
class MutateCustomConversionGoalsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * All results for the mutate.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.MutateCustomConversionGoalResult results = 1;</code>
     */
    private $results;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V9\Services\MutateCustomConversionGoalResult[]|\Google\Protobuf\Internal\RepeatedField $results
     *           All results for the mutate.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V9\Services\CustomConversionGoalService::initOnce();
        parent::__construct($data);
    }

    /**
     * All results for the mutate.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.MutateCustomConversionGoalResult results = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * All results for the mutate.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v9.services.MutateCustomConversionGoalResult results = 1;</code>
     * @param \Google\Ads\GoogleAds\V9\Services\MutateCustomConversionGoalResult[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResults($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V9\Services\MutateCustomConversionGoalResult::class);
        $this->results = $arr;

        return $this;
    }

}

