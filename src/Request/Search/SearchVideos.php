<?php
/**
 * Contains the implementations of Image Searching
 */

namespace GettyImages\Connect\Request\Search {
    use Exception;
    use GettyImages\Connect\Request\Search\Filters\GraphicalStyle\GraphicalStyleFilter;
    use GettyImages\Connect\Request\Search\Filters\LicenseModel\LicenseModelFilter;
    use GettyImages\Connect\Request\Search\Filters\Orientation\OrientationFilter;

    /**
     * Provides Image Search specific behavior
     */
    class SearchVideos extends Search {

        /**
         * @ignore
         */
        protected $route = "search/videos/";

        /**
         * Gets the route configuration of the current search
         *
         * @return string The relative route for this request type
         */
        public function getRoute() {
            return $this->route;
        }

        /**
         * Will create a search configuration that support creative only image searching
         *
         * @internal param \GettyImages\SDK\string|string $phrase optionally provide a search phrase, shortcut to calling Phrase()
         * @return SearchImages Configured for a creative search
         */
        public function Creative() {
            return new SearchVideosCreative($this->credentials,$this->endpointUri,$this->requestDetails);
        }

        /**
         * Will create a search configuration that support editorial only image searching
         *
         * @return SearchImages Configured for a editorial image search
         */
        public function Editorial() {
            return new SearchVideosEditorial($this->credentials,$this->endpointUri, $this->requestDetails);
        }

        /**
         * @param $phrase
         * @return $this
         */
        public function withPhrase($phrase) {
            $this->requestDetails["phrase"] = $phrase;

            return $this;
        }

        /**
         * @param $pageNum
         * @return $this
         */
        public function withPage($pageNum) {
            $this->requestDetails["page"] = $pageNum;

            return $this;
        }

        /**
         * @param $pageSize
         * @return $this
         */
        public function withPageSize($pageSize) {
            $this->requestDetails["page_size"] = $pageSize;
            return $this;
        }
    }
}
