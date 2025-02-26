<?php

class WPM2AWS_MigrationFormTemplate
{
    /**
     * @param $prop
     * @return array|MigrationFormTemplateFieldDto[]
     */
    public static function getDefault($prop)
    {
        if ('register_licence_form' === $prop) {
            $template = self::registerLicenceForm();
        } elseif ('register_trial_user_form' === $prop) {
            $template = self::registerTrialForm();
        } elseif ('iam_form' === $prop) {
            $template = self::iamForm();
        } elseif ('select-region' === $prop) {
            $template = self::awsRegions();
        } elseif ('create-s3-bucket' === $prop) {
            $template = self::createS3Bucket();
        } elseif ('upload-directory-name' === $prop) {
            $template = self::setDirectoryName();
        } elseif ('upload-directory-path' === $prop) {
            $template = self::setDirectoryPath();
        } elseif ('lightsail-instance-name' === $prop) {
            // $template = self::createLightsail();
            $template = self::setLightsailName();
        } elseif ('lightsail-instance-region' === $prop) {
            $template = self::setLightsailRegion();
        } elseif ('aws-get-all-regions' === $prop) {
            $template = self::getAwsRegions();
        } elseif ('set-domain-name' === $prop) {
            $template = self::updateDomainName();
        } elseif ('lightsail-instance-size' === $prop) {
            $template = self::setLightsailInstanceSize();
        } elseif ('lightsail-instance-name-and-size' === $prop) {
            $template = self::setLightsailInstanceNameAndSize();
        } else {
            $template = null;
        }

        return apply_filters('wpm2aws_default_template', $template, $prop);
    }

    /**
     * @return string[]
     */
    public static function getAwsRegions()
    {
        return array(
            'us-east-2' => 'US East (Ohio)',
            'us-east-1' => 'US East (N. Virginia)',
            'us-west-2' => 'US West (Oregon)',
            'ap-south-1' => 'Asia Pacific (Mumbai)',
            'ap-northeast-2' => 'Asia Pacific (Seoul)',
            'ap-southeast-1' => 'Asia Pacific (Singapore)',
            'ap-southeast-2' => 'Asia Pacific (Sydney)',
            'ap-northeast-1' => 'Asia Pacific (Tokyo)',
            'ca-central-1' => 'Canada (Central)',
            'eu-central-1' => 'EU (Frankfurt)',
            'eu-west-1' => 'EU (Ireland)',
            'eu-west-2' => 'EU (London)',
            'eu-west-3' => 'EU (Paris)'
        );
    }

    /**
     * @return string[]
     */
    public static function getAwsRegionsUrls()
    {
        return array(
            'us-east-2' => 'lightsail.us-east-2.amazonaws.com',
            'us-east-1' => 'lightsail.us-east-1.amazonaws.com',
            'us-west-2' => 'lightsail.us-west-2.amazonaws.com',
            'ap-south-1' => 'lightsail.ap-south-1.amazonaws.com',
            'ap-northeast-2' => 'lightsail.ap-northeast-2.amazonaws.com',
            'ap-southeast-1' => 'lightsail.ap-southeast-1.amazonaws.com',
            'ap-southeast-2' => 'lightsail.ap-southeast-2.amazonaws.com',
            'ap-northeast-1' => 'lightsail.ap-northeast-1.amazonaws.com',
            'ca-central-1' => 'lightsail.ca-central-1.amazonaws.com',
            'eu-central-1' => 'lightsail.eu-central-1.amazonaws.com',
            'eu-west-1' => 'lightsail.eu-west-1.amazonaws.com',
            'eu-west-2' => 'lightsail.eu-west-2.amazonaws.com',
            'eu-west-3' => 'lightsail.eu-west-3.amazonaws.com',
        );
    }

    public static function awsRegions()
    {
        $regions = self::getAwsRegions();

        $field = new MigrationFormTemplateFieldDto(
            'select',
            'wpm2aws_awsRegionSelect',
            'wpm2aws_awsRegionSelect',
            __('Select AWS Region', 'migrate-2-aws'),
            __('Select AWS Region', 'migrate-2-aws'),
            $regions,
            get_option('wpm2aws-aws-region', '')
        );

        return [$field];
    }

    public static function createS3Bucket()
    {
        $savedBucketName = get_option('wpm2aws-aws-s3-bucket-name');

        if ($savedBucketName === false) {
            $suggestedBucketName = get_option('wpm2aws-aws-s3-default-bucket-name');

            $bucketName = $suggestedBucketName;
        } else {
            $bucketName = $savedBucketName;
        }

        $field = new MigrationFormTemplateFieldDto(
            'text',
            'wpm2aws_s3BucketName',
            'wpm2aws_s3BucketName',
            __('Name your Storage Target', 'migrate-2-aws'),
            __('Storage Target Name', 'migrate-2-aws'),
            [],
            $bucketName
        );

        return [$field];
    }

    public static function setDirectoryName()
    {
        $field = new MigrationFormTemplateFieldDto(
            'text',
            'wpm2aws_uploadDirectoryName',
           'wpm2aws_uploadDirectoryName',
            __('Set Upload Directory Name', 'migrate-2-aws'),
            __('Upload Directory Name', 'migrate-2-aws'),
            [],
            get_option('wpm2aws-aws-s3-upload-directory-name', '')
        );

        return [$field];
    }

    public static function setDirectoryPath()
    {
        $field = new MigrationFormTemplateFieldDto(
            'text',
            'wpm2aws_uploadDirectoryPath',
            'wpm2aws_uploadDirectoryPath',
            __('Set Upload Directory Path', 'migrate-2-aws'),
            __('Upload Directory Path', 'migrate-2-aws'),
            [],
            get_option('wpm2aws-aws-s3-upload-directory-path', '')
        );

        return [$field];
    }


    public static function setLightsailName()
    {
        $field = new MigrationFormTemplateFieldDto(
            'text',
            'wpm2aws_lightsailName',
            'wpm2aws_lightsailName',
            __('Name your AWS instance', 'migrate-2-aws'),
            __('AWS Instance Name', 'migrate-2-aws'),
            [],
            get_option('wpm2aws-aws-lightsail-name', '')
        );

        return [$field];
    }

    public static function setLightsailRegion()
    {
        $regions = array(
            'us-east-2' => 'US East (Ohio)',
            'us-east-1' => 'US East (N. Virginia)',
            'us-west-2' => 'US West (Oregon)',
            'ap-south-1' => 'Asia Pacific (Mumbai)',
            'ap-northeast-2' => 'Asia Pacific (Seoul)',
            'ap-southeast-1' => 'Asia Pacific (Singapore)',
            'ap-southeast-2' => 'Asia Pacific (Sydney)',
            'ap-northeast-1' => 'Asia Pacific (Tokyo)',
            'ca-central-1' => 'Canada (Central)',
            'eu-central-1' => 'EU (Frankfurt)',
            'eu-west-1' => 'EU (Ireland)',
            'eu-west-2' => 'EU (London)',
            'eu-west-3' => 'EU (Paris)'
        );

        $regionUrl = array(
            'us-east-2' => 'lightsail.us-east-2.amazonaws.com',
            'us-east-1' => 'lightsail.us-east-1.amazonaws.com',
            'us-west-2' => 'lightsail.us-west-2.amazonaws.com',
            'ap-south-1' => 'lightsail.ap-south-1.amazonaws.com',
            'ap-northeast-2' => 'lightsail.ap-northeast-2.amazonaws.com',
            'ap-southeast-1' => 'lightsail.ap-southeast-1.amazonaws.com',
            'ap-southeast-2' => 'lightsail.ap-southeast-2.amazonaws.com',
            'ap-northeast-1' => 'lightsail.ap-northeast-1.amazonaws.com',
            'ca-central-1' => 'lightsail.ca-central-1.amazonaws.com',
            'eu-central-1' => 'lightsail.eu-central-1.amazonaws.com',
            'eu-west-1' => 'lightsail.eu-west-1.amazonaws.com',
            'eu-west-2' => 'lightsail.eu-west-2.amazonaws.com',
            'eu-west-3' => 'lightsail.eu-west-3.amazonaws.com',
        );

        if (false !== get_option('wpm2aws-aws-lightsail-region')) {
            $fieldValue = get_option('wpm2aws-aws-lightsail-region');
        } elseif (false !== get_option('wpm2aws-aws-region')) {
            $fieldValue = get_option('wpm2aws-aws-region');
        } else {
            $fieldValue = '';
        }

        $field = new MigrationFormTemplateFieldDto(
            'select',
            'wpm2aws_lightsailRegionSelect',
            'wpm2aws_lightsailRegionSelect',
            __('Select Region', 'migrate-2-aws'),
            __('AWS Instance - Launch Region', 'migrate-2-aws'),
            $regions,
            $fieldValue
        );

        return [$field];
    }

    public static function setLightsailInstanceSize()
    {
        $aws_instances_sizes = array(
            'Nano' => 'Nano (1x CPU | 0.5Gb Ram | 20Gb Disk)',
            'Micro' => 'Micro (1x CPU | 1Gb Ram | 40Gb Disk)',
            'Small' => 'Small (1x CPU | 2Gb Ram | 60Gb Disk)',
            'Medium' => 'Medium (2x CPU | 4Gb Ram | 80Gb Disk)',
            'Large' => 'Large (2x CPU | 8Gb Ram | 160Gb Disk)',
            'Xlarge' => 'Xlarge (4x CPU | 16Gb Ram | 320Gb Disk)',
            '2Xlarge' => '2Xlarge (8x CPU | 32Gb Ram | 640Gb Disk)',
        );

        $fieldValue = get_option('wpm2aws-aws-lightsail-size');

        if ($fieldValue === false || $fieldValue === '') {
            $fieldValue = WPM2AWS_PLUGIN_AWS_LIGHTSAIL_DEFAULT_SIZE_NAME;
        }

        $field = new MigrationFormTemplateFieldDto(
            'select',
            'wpm2aws_lightsailInstanceSizeSelect',
            'wpm2aws_lightsailInstanceSizeSelect',
            __('Select Instance Size', 'migrate-2-aws'),
            __('AWS Instance - Launch Instance Size', 'migrate-2-aws'),
            $aws_instances_sizes,
            $fieldValue
        );

        return [$field];
    }

    public static function setLightsailInstanceNameAndSize()
    {
        $instanceNameTemplate = self::setLightsailName();
        $instanceSizeTemplate = self::setLightsailInstanceSize();

        return \array_merge($instanceNameTemplate, $instanceSizeTemplate);
    }

    public static function updateDomainName()
    {
        $field = new MigrationFormTemplateFieldDto(
            'text',
            'wpm2aws_lightsailDomainName',
            'wpm2aws_lightsailDomainName',
            __('Domain Name', 'migrate-2-aws'),
            __('Edit Domain Name', 'migrate-2-aws'),
            [],
            get_option('wpm2aws-aws-lightsail-domain-name', '')
        );

        return [$field];
    }

    /**
     * @return array[]
     */
    public static function registerTrialForm()
    {
        $seahorseTrialLicenceKeyField = new MigrationFormTemplateFieldDto(
            'hidden',
            'wpm2aws_licence_key',
            'wpm2aws_licence_key',
            null,
            null,
            [],
            WPM2AWS_TRIAL_LICENCE_KEY
        );

        $formFields = [
            self::getEmailField(),
            $seahorseTrialLicenceKeyField,
        ];

        $sslCheckboxField = self::displaySSLCAdisclaimerOption();

        if ($sslCheckboxField !== null) {
            $formFields[] = $sslCheckboxField;
        }

        return $formFields;
    }

    /**
     * @return array[]
     */
    public static function registerLicenceForm()
    {
        $seahorseLicenceKeyField = new MigrationFormTemplateFieldDto(
            'text',
            'wpm2aws_licence_key',
            'wpm2aws_licence_key',
            __('Pro Users Only: Enter the Licence Key received from Seahorse', 'migrate-2-aws'),
            __('Licence key  (Pro Users Only)', 'migrate-2-aws'),
            [],
            get_option('wpm2aws_licence_key', '')
        );

        $formFields = [
            self::getEmailField(),
            $seahorseLicenceKeyField,
        ];

        $sslCheckboxField = self::displaySSLCAdisclaimerOption();

        if ($sslCheckboxField !== null) {
            $formFields[] = $sslCheckboxField;
        }

        return $formFields;
    }

    /**
     * @return MigrationFormTemplateFieldDto
     */
    private static function getEmailField()
    {
        $registeredEmail = get_option('wpm2aws_licence_email');
        if ($registeredEmail !== false && $registeredEmail !== '' ) {
            $licenceEmail = $registeredEmail;
        } else {
            $licenceEmail = get_option('admin_email');
        }

        return new MigrationFormTemplateFieldDto(
            'email',
            'wpm2aws_licence_email',
            'wpm2aws_licence_email',
            __('Enter the Email Address used when registering with Seahorse', 'migrate-2-aws'),
            __('Email Address', 'migrate-2-aws'),
            [],
            $licenceEmail
        );
    }

    /**
     * @return MigrationFormTemplateFieldDto|null
     */
    private static function displaySSLCAdisclaimerOption()
    {
        $showHttpDisclaimer = get_option('wpm2aws-show-http-disclaimer');
        $unableToProceedError = get_option('wpm2aws-unable-to-proceed-error');

        if ($showHttpDisclaimer !== false && $unableToProceedError === false) {
            return new MigrationFormTemplateFieldDto(
                'checkbox',
                'wpm2aws_accept_ssl_error',
                'wpm2aws_accept_ssl_error',
                null,
                __('This software requires a valid SSL certificate (and certification authority certificate (CA) on localhost environments) to transfer data securely over a web-based protocol. The requirements check has detected that you do not have a valid SSL certificate in place on this site. It is possible to proceed over http only, however, please check this box which accepts that you understand the risks involved in transferring data over http and are willing to proceed on this basis.', 'migrate-2-aws'),
                [],
                '1'
            );
        }

        return null;
    }

    public static function iamForm()
    {
        return [
            new MigrationFormTemplateFieldDto(
                'text',
                'wpm2aws_iamid',
                'wpm2aws_iamid',
                __('Enter your xx digit IAM Key', 'migrate-2-aws'),
                __('IAM Key', 'migrate-2-aws'),
                [],
                get_option('wpm2aws-iamid', '')
            ),
            new MigrationFormTemplateFieldDto(
                'text',
                'wpm2aws_iampw',
                'wpm2aws_iampw',
                __('Enter your xx digit IAM Secret', 'migrate-2-aws'),
                __('IAM Secret', 'migrate-2-aws'),
                [],
                get_option('wpm2aws-iampw', '')
            ),
        ];
    }
}
