<?php

namespace Sabberworm\CSS\Value;

use Sabberworm\CSS\Parsing\ParserState;
use Sabberworm\CSS\Parsing\UnexpectedTokenException;

class CalcFunction extends CSSFunction {
	const T_OPERAND  = 1;
	const T_OPERATOR = 2;

	public static function parse(ParserState $oParserState) {
		$aOperators = array('+', '-', '*', '/');
		$sFunction = trim($oParserState->consumeUntil('(', false, true));
		$oCalcList = new CalcRuleValueList(esc_html($oParserState->currentLine()));
		$oList = new RuleValueList(',', esc_html($oParserState->currentLine()));
		$iNestingLevel = 0;
		$iLastComponentType = NULL;
		while(!$oParserState->comes(')') || $iNestingLevel > 0) {
			$oParserState->consumeWhiteSpace();
			if ($oParserState->comes('(')) {
				$iNestingLevel++;
				$oCalcList->addListComponent($oParserState->consume(1));
				continue;
			} else if ($oParserState->comes(')')) {
				$iNestingLevel--;
				$oCalcList->addListComponent($oParserState->consume(1));
				continue;
			}
			if ($iLastComponentType != CalcFunction::T_OPERAND) {
				$oVal = Value::parsePrimitiveValue($oParserState);
				$oCalcList->addListComponent($oVal);
				$iLastComponentType = CalcFunction::T_OPERAND;
			} else {
				if (in_array($oParserState->peek(), $aOperators)) {
					if (($oParserState->comes('-') || $oParserState->comes('+'))) {
						if ($oParserState->peek(1, -1) != ' ' || !($oParserState->comes('- ') || $oParserState->comes('+ '))) {
							// phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped
							throw new UnexpectedTokenException(" {$oParserState->peek()} ", $oParserState->peek(1, -1) . $oParserState->peek(2), 'literal', esc_html($oParserState->currentLine()));
						}
					}
					$oCalcList->addListComponent($oParserState->consume(1));
					$iLastComponentType = CalcFunction::T_OPERATOR;
				} else {
					throw new UnexpectedTokenException(
						// phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped
						sprintf(
							'Next token was expected to be an operand of type %s. Instead "%s" was found.',
							// phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped
							implode(', ', $aOperators),
							// phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped
							$oVal
						),
						'',
						'custom',
						// phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped
						$oParserState->currentLine()
					);
				}
			}
		}
		$oList->addListComponent($oCalcList);
		$oParserState->consume(')');
		return new CalcFunction($sFunction, $oList, ',', esc_html($oParserState->currentLine()));
	}

}
