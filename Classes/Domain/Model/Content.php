<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Juerg Langhard <langhard@greenbanana.ch>, GreenBanana GmbH
*  	
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Content (tt_content)
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_T3mobile_Domain_Model_Content extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * contentType
	 *
	 * @var string $contentType
	 */
	protected $contentType;

	/**
	 * header
	 *
	 * @var string $header
	 */
	protected $header;

	/**
	 * headerPosition
	 *
	 * @var string $headerPosition
	 */
	protected $headerPosition;

	/**
	 * bodytext
	 *
	 * @var string $bodytext
	 */
	protected $bodytext;

	/**
	 * image
	 *
	 * @var string $image
	 */
	protected $image;

	/**
	 * imageWidth
	 *
	 * @var string $imageWidth
	 */
	protected $imageWidth;

	/**
	 * imageOrientation
	 *
	 * @var integer $imageOrientation
	 */
	protected $imageOrientation;

	/**
	 * imageCaption
	 *
	 * @var string $imageCaption
	 */
	protected $imageCaption;

	/**
	 * imageColumns
	 *
	 * @var string $imageColumns
	 */
	protected $imageColumns;

	/**
	 * imageBorder
	 *
	 * @var string $imageBorder
	 */
	protected $imageBorder;

	/**
	 * media
	 *
	 * @var string $media
	 */
	protected $media;

	/**
	 * layout
	 *
	 * @var string $layout
	 */
	protected $layout;

	/**
	 * columns
	 *
	 * @var integer $columns
	 */
	protected $columns;

	/**
	 * records
	 *
	 * @var string $records
	 */
	protected $records;

	/**
	 * pages
	 *
	 * @var string $pages
	 */
	protected $pages;

	/**
	 * startTime
	 *
	 * @var DateTime $startTime
	 */
	protected $startTime;

	/**
	 * endTime
	 *
	 * @var DateTime $endTime
	 */
	protected $endTime;

	/**
	 * columnPosition
	 *
	 * @var string $columnPosition
	 */
	protected $columnPosition;

	/**
	 * subheader
	 *
	 * @var string $subheader
	 */
	protected $subheader;

	/**
	 * listType
	 *
	 * @var string $listType
	 */
	protected $listType;
	
	/**
	 * isMobileOnlyContent
	 *
	 * @var boolean $isMobileOnlyContent
	 */
	protected $isMobileOnlyContent;	

	/**
	 * Setter for contentType
	 *
	 * @param string $contentType contentType
	 * @return void
	 */
	public function setContentType($contentType) {
		$this->contentType = $contentType;
	}

	/**
	 * Getter for contentType
	 *
	 * @return string contentType
	 */
	public function getContentType() {
		return $this->contentType;
	}

	/**
	 * Setter for header
	 *
	 * @param string $header header
	 * @return void
	 */
	public function setHeader($header) {
		$this->header = $header;
	}

	/**
	 * Getter for header
	 *
	 * @return string header
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * Setter for headerPosition
	 *
	 * @param string $headerPosition headerPosition
	 * @return void
	 */
	public function setHeaderPosition($headerPosition) {
		$this->headerPosition = $headerPosition;
	}

	/**
	 * Getter for headerPosition
	 *
	 * @return string headerPosition
	 */
	public function getHeaderPosition() {
		return $this->headerPosition;
	}

	/**
	 * Setter for bodytext
	 *
	 * @param string $bodytext bodytext
	 * @return void
	 */
	public function setBodytext($bodytext) {
		$this->bodytext = $bodytext;
	}

	/**
	 * Getter for bodytext
	 *
	 * @return string bodytext
	 */
	public function getBodytext() {
		return $this->bodytext;
	}

	/**
	 * Setter for image
	 *
	 * @param string $image image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Getter for image
	 *
	 * @return string image
	 */
	public function getImage() {
		return t3lib_div::trimExplode(',', $this->image);
	}

	/**
	 * Setter for imageWidth
	 *
	 * @param string $imageWidth imageWidth
	 * @return void
	 */
	public function setImageWidth($imageWidth) {
		$this->imageWidth = $imageWidth;
	}

	/**
	 * Getter for imageWidth
	 *
	 * @return string imageWidth
	 */
	public function getImageWidth() {
		return $this->imageWidth;
	}

	/**
	 * Setter for imageOrientation
	 *
	 * @param integer $imageOrientation imageOrientation
	 * @return void
	 */
	public function setImageOrientation($imageOrientation) {
		$this->imageOrientation = $imageOrientation;
	}

	/**
	 * Getter for imageOrientation
	 *
	 * @return integer imageOrientation
	 */
	public function getImageOrientation() {
		return $this->imageOrientation;
	}

	/**
	 * Setter for imageCaption
	 *
	 * @param string $imageCaption imageCaption
	 * @return void
	 */
	public function setImageCaption($imageCaption) {
		$this->imageCaption = $imageCaption;
	}

	/**
	 * Getter for imageCaption
	 *
	 * @return string imageCaption
	 */
	public function getImageCaption() {
		return $this->imageCaption;
	}

	/**
	 * Setter for imageColumns
	 *
	 * @param string $imageColumns imageColumns
	 * @return void
	 */
	public function setImageColumns($imageColumns) {
		$this->imageColumns = $imageColumns;
	}

	/**
	 * Getter for imageColumns
	 *
	 * @return string imageColumns
	 */
	public function getImageColumns() {
		return $this->imageColumns;
	}

	/**
	 * Setter for imageBorder
	 *
	 * @param string $imageBorder imageBorder
	 * @return void
	 */
	public function setImageBorder($imageBorder) {
		$this->imageBorder = $imageBorder;
	}

	/**
	 * Getter for imageBorder
	 *
	 * @return string imageBorder
	 */
	public function getImageBorder() {
		return $this->imageBorder;
	}

	/**
	 * Setter for media
	 *
	 * @param string $media media
	 * @return void
	 */
	public function setMedia($media) {
		$this->media = $media;
	}

	/**
	 * Getter for media
	 *
	 * @return string media
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Setter for layout
	 *
	 * @param string $layout layout
	 * @return void
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}

	/**
	 * Getter for layout
	 *
	 * @return string layout
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * Setter for columns
	 *
	 * @param integer $columns columns
	 * @return void
	 */
	public function setColumns($columns) {
		$this->columns = $columns;
	}

	/**
	 * Getter for columns
	 *
	 * @return integer columns
	 */
	public function getColumns() {
		return $this->columns;
	}

	/**
	 * Setter for records
	 *
	 * @param string $records records
	 * @return void
	 */
	public function setRecords($records) {
		$this->records = $records;
	}

	/**
	 * Getter for records
	 *
	 * @return string records
	 */
	public function getRecords() {
		return $this->records;
	}

	/**
	 * Setter for pages
	 *
	 * @param string $pages pages
	 * @return void
	 */
	public function setPages($pages) {
		$this->pages = $pages;
	}

	/**
	 * Getter for pages
	 *
	 * @return string pages
	 */
	public function getPages() {
		return $this->pages;
	}

	/**
	 * Setter for startTime
	 *
	 * @param DateTime $startTime startTime
	 * @return void
	 */
	public function setStartTime(DateTime $startTime) {
		$this->startTime = $startTime;
	}

	/**
	 * Getter for startTime
	 *
	 * @return DateTime startTime
	 */
	public function getStartTime() {
		return $this->startTime;
	}

	/**
	 * Setter for endTime
	 *
	 * @param DateTime $endTime endTime
	 * @return void
	 */
	public function setEndTime(DateTime $endTime) {
		$this->endTime = $endTime;
	}

	/**
	 * Getter for endTime
	 *
	 * @return DateTime endTime
	 */
	public function getEndTime() {
		return $this->endTime;
	}

	/**
	 * Setter for columnPosition
	 *
	 * @param string $columnPosition columnPosition
	 * @return void
	 */
	public function setColumnPosition($columnPosition) {
		$this->columnPosition = $columnPosition;
	}

	/**
	 * Getter for columnPosition
	 *
	 * @return string columnPosition
	 */
	public function getColumnPosition() {
		return $this->columnPosition;
	}

	/**
	 * Setter for subheader
	 *
	 * @param string $subheader subheader
	 * @return void
	 */
	public function setSubheader($subheader) {
		$this->subheader = $subheader;
	}

	/**
	 * Getter for subheader
	 *
	 * @return string subheader
	 */
	public function getSubheader() {
		return $this->subheader;
	}

	/**
	 * Setter for listType
	 *
	 * @param string $listType listType
	 * @return void
	 */
	public function setListType($listType) {
		$this->listType = $listType;
	}

	/**
	 * Getter for listType
	 *
	 * @return string listType
	 */
	public function getListType() {
		return $this->listType;
	}
	
	/**
	 * Getter for listType
	 *
	 * @return string listType
	 */
	public function isMobileOnlyContent() {
		if($this->columnPosition == 255){
			return true;
		}else{
			return false;
		}
	}	

}
?>