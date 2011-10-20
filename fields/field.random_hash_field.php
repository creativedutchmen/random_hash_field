<?php

	require_once(TOOLKIT . '/fields/field.input.php');
	
	class fieldRandom_Hash_Field extends fieldInput{

		function __construct(&$parent){
			parent::__construct($parent);
			$this->_name = __('Random Hash Field');
			$this->_required = false;
			$this->set('location', 'sidebar');
		}

		public function displayPublishPanel(&$wrapper, $data=NULL, $flagWithError=NULL, $fieldnamePrefix=NULL, $fieldnamePostfix=NULL, $entry_id = null){
			$value = General::sanitize($data['value']);
			$label = Widget::Label($this->get('label'));
			if($this->get('required') != 'yes') $label->appendChild(new XMLElement('i', __('Optional')));
			$label->appendChild(Widget::Input('fields'.$fieldnamePrefix.'['.$this->get('element_name').']'.$fieldnamePostfix, (strlen($value) != 0 ? $value : NULL), 'text', array('disabled'=>'true')));
			$label->appendChild(Widget::Input('fields'.$fieldnamePrefix.'['.$this->get('element_name').']'.$fieldnamePostfix, (strlen($value) != 0 ? $value : NULL), 'hidden'));

			if($flagWithError != NULL) $wrapper->appendChild(Widget::wrapFormElementWithError($label, $flagWithError));
			else $wrapper->appendChild($label);
		}

		public function processRawFieldData($data, &$status, $simulate = false, $entry_id = null) {
			$status = self::__OK__;

			if (strlen(trim($data)) == 0){
				$value = sha1(mt_rand());
				return array(
					'value' => $value,
					'handle' => Lang::createHandle($value)
				);
			}

			$result = array(
				'value' => $data,
				'handle' => Lang::createHandle($data)
			);

			return $result;
		}
	}
