<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Oliver Klee <typo3-coding@oliverklee.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case.
 *
 * @package TYPO3
 * @subpackage tx_phpunit
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Phpunit_ViewHelpers_ProgressBarViewHelperTest extends Tx_Phpunit_TestCase {
	/**
	 * @var Tx_Phpunit_ViewHelpers_ProgressBarViewHelper
	 */
	protected $subject = NULL;

	/**
	 * @var Tx_Phpunit_Service_FakeOutputService
	 */
	protected $outputService = NULL;

	public function setUp() {
		$this->subject = new Tx_Phpunit_ViewHelpers_ProgressBarViewHelper();

		$this->outputService = new Tx_Phpunit_Service_FakeOutputService();
		$this->subject->injectOutputService($this->outputService);
	}

	public function tearDown() {
		unset($this->subject, $this->outputService);
	}

	/**
	 * @test
	 */
	public function classIsSubclassAbstractViewHelper() {
		$this->assertInstanceOf(
			'Tx_Phpunit_ViewHelpers_AbstractViewHelper',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function renderCreatesProgressBarHtmlId() {
		$this->subject->render();

		$this->assertContains(
			'id="progress-bar"',
			$this->outputService->getCollectedOutput()
		);
	}
}
?>