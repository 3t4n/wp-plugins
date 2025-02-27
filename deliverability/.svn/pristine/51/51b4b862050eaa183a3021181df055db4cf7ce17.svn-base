<?php

namespace TopDeliverability\Score;

class AnalysisResultDetailAdapter {

	/**
	 * @return string
	 */
	public function translateLearnMoreLinkLabel() {
		return __( 'Learn more', 'deliverability' );
	}

	/**
	 * @param string $name
	 *
	 * @return string|null
	 */
	public function getLearnMoreLink( $name ) {
		switch ( $name ) {
			case 'dmarc':
				return 'https://topdeliverability.com/dmarc-troubleshooting-guide/';
			case 'spf':
				return 'https://topdeliverability.com/spf-troubleshooting-guide/';
			case 'dkim':
				return 'https://topdeliverability.com/dkim-troubleshooting-guide/';
			case 'domain_age':
			default:
				return null;
		}
	}

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	public function translateSectionDescription( $name ) {
		switch ( $name ) {
			case 'dmarc':
				return __( 'DMARC, or Domain-based Message Authentication, Reporting, and Conformance, is an email authentication protocol that allows domain owners to protect their domain from unauthorized use, such as spam and phishing attacks. It is important because it helps protect against these types of cyber threats and helps ensure the authenticity of emails from a specific domain. This helps prevent email spoofing, which is when attackers send emails that appear to be from a legitimate source but are actually fraudulent. DMARC also provides reporting and feedback mechanisms to help domain owners monitor and improve their email authentication practices.', 'deliverability' );
			case 'spf':
				return __( "A sender policy framework (SPF) is a security protocol that helps prevent email spoofing by verifying the sender's identity and ensuring that the email is being sent from an authorized server. This is important because email spoofing is a common tactic used by cybercriminals to send fraudulent or malicious emails that appear to be from legitimate sources, such as a bank or government agency. SPF helps to protect individuals and organizations from these types of scams, by ensuring that the sender's identity is authentic and the email is coming from a trusted source.", 'deliverability' );
			case 'dkim':
				return __( 'DKIM (DomainKeys Identified Mail) is an email authentication technique that uses a digital signature to verify that an email message has not been altered during transit. It is important because it helps protect against spam, phishing, and other types of email fraud. By verifying the authenticity of an email message, DKIM helps ensure that the sender is who they claim to be, and that the message has not been tampered with. This helps to prevent malicious actors from sending fake or fraudulent emails that could potentially harm the recipient. Overall, DKIM is an important tool for securing email communications and protecting against cyber threats.', 'deliverability' );
			case 'domain_age':
				return __( 'Domain age refers to the length of time that a domain name has been registered and in use. It is important for the domain reputation because older domains tend to have a better reputation and are generally more trustworthy. This is because older domains have had more time to establish themselves, build up a positive online presence, and develop a good reputation. Additionally, newer domains are often considered less credible and authoritative because they didn’t have the time to build an audience.', 'deliverability' );
			case 'mx':
				return __( "An MX record is a type of DNS entry that designates which mail servers are responsible for receiving email messages for a specific domain. MX records play a crucial role in email deliverability, since it's not enough for a sender to just be able to send emails; they also need to receive them. Without correct MX records, emails may not reach their intended recipients, or may be flagged as spam and rejected. Thus, setting up MX records correctly is vital to ensure effective email communication.", 'deliverability' );
			case 'blacklist':
				return __( 'A blacklist is a list of IP addresses or domains that have been identified as sources of spam or other malicious activity. Email providers and other organizations use these lists to filter out unwanted email and prevent security threats. We check your domain and IP on popular and relevant blacklists to ensure your emails can reach their recipients and avoid being flagged as spam.', 'deliverability' );
			case 'bimi':
				return __( "BIMI (Brand Indicators for Message Identification) helps companies display their logos in the email inboxes of recipients. A BIMI record is a DNS (Domain Name System) record that contains a link to the company's logo. Email servers check for a valid BIMI record when an email is received, and use the information to display the logo in the email inbox. BIMI can help combat phishing, improve email deliverability, and increase brand recognition.", 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @param string $scoreDetail
	 * @param string $name
	 *
	 * @return string
	 */
	public function translateDetailTitle( $scoreDetail, $name ) {
		switch ( $name ) {
			case 'dmarc':
				return $this->translateDmarcTitle( $scoreDetail );
			case 'spf':
				return $this->translateSpfTitle( $scoreDetail );
			case 'dkim':
				return $this->translateDkimTitle( $scoreDetail );
			case 'domain_age':
				return $this->translateDomainAgeTitle( $scoreDetail );
			case 'bimi':
				return $this->translateBimiTitle( $scoreDetail );
			default:
				return $scoreDetail;
		}
	}

	/**
	 * @param string $scoreDetail
	 * @param string $name
	 *
	 * @return string
	 */
	public function translateDetailDescription( $scoreDetail, $name ) {
		switch ( $name ) {
			case 'dmarc':
				return $this->translateDmarcDescription( $scoreDetail );
			case 'spf':
				return $this->translateSpfDescription( $scoreDetail );
			case 'dkim':
				return $this->translateDkimDescription( $scoreDetail );
			case 'domain_age':
				return $this->translateDomainAgeDescription( $scoreDetail );
			case 'bimi':
				return $this->translateBimiDescription( $scoreDetail );
			default:
				return $scoreDetail;
		}
	}

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	public function translateDetailTooltip( $name ) {
		switch ( $name ) {
			case 'dmarc':
				return __( 'DMARC (Domain-based Message Authentication, Reporting, and Conformance) ties SPF and DKIM together, providing a policy framework for these protocols.', 'deliverability' );
			case 'spf':
				return __( 'SPF (Sender Policy Framework) verifies that your emails are sent from authorized servers.', 'deliverability' );
			case 'dkim':
				return __( 'DKIM (DomainKeys Identified Mail) adds a digital signature to your emails, ensuring they haven\'t been tampered with.', 'deliverability' );
			case 'domain_age':
				return __( 'Domain age impacts reputation; older domains are more trusted due to established presence and credibility. Newer domains lack trust and authority as they haven\'t built reputation or audience yet.', 'deliverability' );
			case 'bimi':
				return __( 'BIMI shows logos in emails, using DNS records. It helps fighting phishing by enhancing brand recognition.', 'deliverability' );
			case 'mx':
				return __( 'MX records designate recipient mail servers for a domain. It\'s not enough for a sender to just be able to send emails; they also need to receive them.', 'deliverability' );
			case 'blacklist':
				return __( 'A list of spammy or malicious sources used by email providers to filter out unwanted emails. We check your domain and IP against these lists to ensure your emails aren\'t flagged as spam.', 'deliverability' );
			default:
				return $name;
		}
	}

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	public function translateSuccessfulSectionTitle( $name ) {
		switch ( $name ) {
			case 'dmarc':
				return __( 'The DMARC record appears to be correct and properly formatted.', 'deliverability' );
			case 'spf':
				return __( 'The SPF record appears to be correct and properly formatted.', 'deliverability' );
			case 'dkim':
				return __( 'The DKIM record appears to be correct and properly formatted.', 'deliverability' );
			case 'bimi':
				return __( 'A valid BIMI record is present for the domain, and it appears to be correctly formatted.', 'deliverability' );
			case 'domain_age':
			default:
				return '';
		}
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateDmarcTitle( $code ) {
		switch ( $code ) {
			case 'NO_RECORD':
				return __( 'No DMARC Record', 'deliverability' );
			case 'MALFORMED_RECORD':
				return __( 'DMARC Syntax Error', 'deliverability' );
			case 'DOUBLE_QUOTED_RECORD':
				return __( 'Double Quoted Record', 'deliverability' );
			case 'UNKNOWN_TAG':
				return __( 'Unknown Tag', 'deliverability' );
			case 'MISSING_RUA_AND_RUF':
				return __( 'No Reporting Addresses', 'deliverability' );
			case 'RUF_WITHOUT_RUA':
				return __( 'No Address for Aggregate Reports', 'deliverability' );
			case 'USELESS_PCT':
				return __( 'Useless PCT Tag', 'deliverability' );
			case 'MISSING_REPORT_AUTHORIZATION_RECORD':
				return __( 'Missing Report Authorization Record', 'deliverability' );
			case 'MALFORMED_RUA':
				return __( 'Invalid Reporting Address', 'deliverability' );
			case 'RECORD_ON_PARENT_DOMAIN_WITHOUT_SP':
				return __( 'Inherited Policy', 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateSpfTitle( $code ) {
		switch ( $code ) {
			case 'NO_RECORD':
				return __( 'No SPF record is present', 'deliverability' );
			case 'MULTIPLE_RECORDS':
				return __( 'You have multiple SPF Records', 'deliverability' );
			case 'DOUBLE_QUOTED_RECORD':
				return __( 'SPF Record is Double Quoted', 'deliverability' );
			case 'RECORD_TOO_LONG':
				return __( 'SPF Record is Too Long', 'deliverability' );
			case 'DEPRECATED_PTR_MECHANISM':
				return __( 'Deprecated mechanism in SPF', 'deliverability' );
			case 'UNKNOWN_MECHANISM':
				return __( 'Unknown mechanism in SPF', 'deliverability' );
			case 'TYPO_IN_MECHANISM':
				return __( 'Typo mechanism in SPF', 'deliverability' );
			case 'MISSING_PREFIX':
				return __( 'SPF Syntax Error', 'deliverability' );
			case 'TOO_MANY_LOOKUPS':
				return __( 'Too many Lookups', 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateDkimTitle( $code ) {
		switch ( $code ) {
			case 'NOT_CONFIGURED':
				return __( 'DKIM signing not enabled', 'deliverability' );
			case 'MALFORMED_RECORD':
				return __( 'DKIM syntax error', 'deliverability' );
			case 'NOT_FOUND':
				return __( 'No DKIM record', 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateDomainAgeTitle( $code ) {
		return '';
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateBimiTitle( $code ) {
		switch ( $code ) {
			case 'NOT_FOUND':
				return __( 'Missing - no BIMI record found', 'deliverability' );
			case 'MALFORMED_RECORD':
				return __( 'Error - An invalid BIMI record exists', 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateDmarcDescription( $code ) {
		switch ( $code ) {
			case 'NO_RECORD':
				return __( 'We were unable to find a DMARC record for this domain. DMARC is an important security measure that helps protect against email spoofing and phishing attacks. Please consider setting up a DMARC record for your domain to ensure the security and authenticity of your email communications.', 'deliverability' );
			case 'MALFORMED_RECORD':
				return __( 'DMARC record contains syntax errors. Please check your DMARC record for any mistakes and try again.', 'deliverability' );
			case 'DOUBLE_QUOTED_RECORD':
				return __( 'Invalid DMARC record. Double quotes are not allowed in DMARC records. Please remove the double quotes and try again.', 'deliverability' );
			case 'UNKNOWN_TAG':
				return __( 'DMARC record contains unknown tag. Please check your DMARC record and remove any unrecognized tags.', 'deliverability' );
			case 'MISSING_RUA_AND_RUF':
				return __( 'DMARC record does not contain any reporting addresses. Please update your DMARC record to include at least one reporting address.', 'deliverability' );
			case 'RUF_WITHOUT_RUA':
				return __( 'DMARC record found, but no aggregate report address specified. Please add an aggregate report address to your DMARC record to enable reporting on email authentication.', 'deliverability' );
			case 'USELESS_PCT':
				return __( 'DMARC record contains useless tags (PCT=100). Please remove any unnecessary tags and ensure that the record adheres to the DMARC specification.', 'deliverability' );
			case 'MISSING_REPORT_AUTHORIZATION_RECORD':
				return __( 'DMARC reports cannot be sent to this domain as there is no authorization record present. Please ensure that the correct domain is specified in the DMARC record or obtain authorization to send reports to this domain.', 'deliverability' );
			case 'MALFORMED_RUA':
				return __( 'The DMARC aggregate report address is malformed. Please check the format and try again.', 'deliverability' );
			case 'RECORD_ON_PARENT_DOMAIN_WITHOUT_SP':
				return __( 'The policy is inherited from the root domain. This means that the DMARC policy set by the root domain will also apply to your domain.', 'deliverability' );
			case 'MULTIPLE_RECORDS':
				return __( 'It appears that you have multiple DMARC records. Please be aware that only one DMARC record is permitted. Having multiple records is a critical error and may lead to unexpected issues, such as being treated as if no DMARC record exists.', 'deliverability' );
			case 'WRONG_TAG_ORDER':
				return __( 'Please be aware that, according to the RFC specifications, the "p=" tag should immediately follow "v=DMARC1" as the first tag in your record. Positioning the "p=" tag elsewhere is considered incorrect.', 'deliverability' );
			case 'TOO_MANY_RUA':
				return __( 'Your DMARC record includes too many RUA entries. Please note that specifying more than two email addresses is not recommended, as some systems may disregard any additional addresses.', 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateSpfDescription( $code ) {
		switch ( $code ) {
			case 'NO_RECORD':
				return __( 'This domain does not have an SPF record. Please set up an SPF record in order to prevent email spoofing.', 'deliverability' );
			case 'MULTIPLE_RECORDS':
				return __( 'Multiple SPF records found for domain. Please check DNS settings and ensure that only one SPF record is present.', 'deliverability' );
			case 'DOUBLE_QUOTED_RECORD':
				return __( 'Invalid SPF record. Double quotes are not allowed in SPF records. Please remove the double quotes and try again.', 'deliverability' );
			case 'RECORD_TOO_LONG':
				return __( "The domain's SPF record is too long and cannot be processed. Please review and shorten the record to meet the maximum length requirement.", 'deliverability' );
			case 'DEPRECATED_PTR_MECHANISM':
				return __( "The domain's SPF record contains a deprecated mechanism. Please update the record to use only current mechanisms for proper email delivery.", 'deliverability' );
			case 'UNKNOWN_MECHANISM':
				return __( "The domain's SPF record contains an unknown mechanism. Please review and update the record to ensure proper email delivery.", 'deliverability' );
			case 'TYPO_IN_MECHANISM':
				return __( 'The SPF record for this domain contains a mistyped mechanism. Please correct the mechanism and update the SPF record to ensure proper email delivery.', 'deliverability' );
			case 'MISSING_PREFIX':
				return __( 'SPF record contains syntax errors. Please check your SPF record for any mistakes and try again.', 'deliverability' );
			case 'TOO_MANY_LOOKUPS':
				return __( "The domain's SPF record has exceeded the maximum number of lookups allowed (10). Please review and reduce the number of included domains to meet the limit.", 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateDkimDescription( $code ) {
		switch ( $code ) {
			case 'NOT_CONFIGURED':
				return __( 'Email messages are not being DKIM signed. This may cause issues with delivery and authenticity of the emails. Setup your DKIM configuration now and ensure that signing is enabled.', 'deliverability' );
			case 'MALFORMED_RECORD':
				return __( 'DKIM record contains syntax errors. Please check your DKIM record for any mistakes and try again.', 'deliverability' );
			case 'NOT_FOUND':
				return __( 'DKIM record not found. Please check that the correct DNS record is set up for your domain.', 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateDomainAgeDescription( $code ) {
		return '';
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	private function translateBimiDescription( $code ) {
		switch ( $code ) {
			case 'NOT_FOUND':
				return __( 'There is no BIMI record associated with your domain.', 'deliverability' );
			case 'MALFORMED_RECORD':
				return __( 'A BIMI record exists, but it seems to be improperly formatted.', 'deliverability' );
			default:
				return '';
		}
	}

	/**
	 * @return string
	 */
	public function translateDnsBlacklistLabel() {
		return __( 'Address', 'deliverability' );
	}

	public function translateRhsBlacklistLabel() {
		return __( 'Domain', 'deliverability' );
	}
}
