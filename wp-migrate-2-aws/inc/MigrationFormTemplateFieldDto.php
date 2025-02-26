<?php

class MigrationFormTemplateFieldDto
{
    /**
     * @var string
     */
    private $fieldType;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var string
     */
    private $fieldId;

    /**
     * @var string|null
     */
    private $fieldPlaceholder;

    /**
     * @var string|null
     */
    private $fieldLabel;

    /**
     * @var array
     */
    private $fieldData;

    /**
     * @var string|null
     */
    private $fieldValue;

    /**
     * @param string $fieldType
     * @param string $fieldName
     * @param string $fieldId
     * @param string|null $fieldPlaceholder
     * @param string|null $fieldLabel
     * @param array $fieldData
     * @param string|null $fieldValue
     */
    public function __construct($fieldType, $fieldName, $fieldId, $fieldPlaceholder, $fieldLabel, $fieldData, $fieldValue)
    {
        $this->fieldType = $fieldType;
        $this->fieldName = $fieldName;
        $this->fieldId = $fieldId;
        $this->fieldPlaceholder = $fieldPlaceholder;
        $this->fieldLabel = $fieldLabel;
        $this->fieldData = $fieldData;
        $this->fieldValue = $fieldValue;
    }

    /**
     * @return string
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @return string
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * @return string|null
     */
    public function getFieldPlaceholder()
    {
        return $this->fieldPlaceholder;
    }

    /**
     * @return string|null
     */
    public function getFieldLabel()
    {
        return $this->fieldLabel;
    }

    /**
     * @return array|null
     */
    public function getFieldData()
    {
        return $this->fieldData;
    }

    /**
     * @return string|null
     */
    public function getFieldValue()
    {
        return $this->fieldValue;
    }
}
