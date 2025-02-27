/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@wordpress/escape-html/build-module/escape-greater.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@wordpress/escape-html/build-module/escape-greater.js ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ __unstableEscapeGreaterThan)
/* harmony export */ });
/**
 * Returns a string with greater-than sign replaced.
 *
 * Note that if a resolution for Trac#45387 comes to fruition, it is no longer
 * necessary for `__unstableEscapeGreaterThan` to exist.
 *
 * See: https://core.trac.wordpress.org/ticket/45387
 *
 * @param {string} value Original string.
 *
 * @return {string} Escaped string.
 */
function __unstableEscapeGreaterThan(value) {
  return value.replace(/>/g, '&gt;');
}

/***/ }),

/***/ "./node_modules/@wordpress/escape-html/build-module/index.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/escape-html/build-module/index.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   escapeAmpersand: () => (/* binding */ escapeAmpersand),
/* harmony export */   escapeAttribute: () => (/* binding */ escapeAttribute),
/* harmony export */   escapeEditableHTML: () => (/* binding */ escapeEditableHTML),
/* harmony export */   escapeHTML: () => (/* binding */ escapeHTML),
/* harmony export */   escapeLessThan: () => (/* binding */ escapeLessThan),
/* harmony export */   escapeQuotationMark: () => (/* binding */ escapeQuotationMark),
/* harmony export */   isValidAttributeName: () => (/* binding */ isValidAttributeName)
/* harmony export */ });
/* harmony import */ var _escape_greater__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./escape-greater */ "./node_modules/@wordpress/escape-html/build-module/escape-greater.js");
/**
 * Internal dependencies
 */


/**
 * Regular expression matching invalid attribute names.
 *
 * "Attribute names must consist of one or more characters other than controls,
 * U+0020 SPACE, U+0022 ("), U+0027 ('), U+003E (>), U+002F (/), U+003D (=),
 * and noncharacters."
 *
 * @see https://html.spec.whatwg.org/multipage/syntax.html#attributes-2
 *
 * @type {RegExp}
 */
const REGEXP_INVALID_ATTRIBUTE_NAME = /[\u007F-\u009F "'>/="\uFDD0-\uFDEF]/;

/**
 * Returns a string with ampersands escaped. Note that this is an imperfect
 * implementation, where only ampersands which do not appear as a pattern of
 * named, decimal, or hexadecimal character references are escaped. Invalid
 * named references (i.e. ambiguous ampersand) are still permitted.
 *
 * @see https://w3c.github.io/html/syntax.html#character-references
 * @see https://w3c.github.io/html/syntax.html#ambiguous-ampersand
 * @see https://w3c.github.io/html/syntax.html#named-character-references
 *
 * @param {string} value Original string.
 *
 * @return {string} Escaped string.
 */
function escapeAmpersand(value) {
  return value.replace(/&(?!([a-z0-9]+|#[0-9]+|#x[a-f0-9]+);)/gi, '&amp;');
}

/**
 * Returns a string with quotation marks replaced.
 *
 * @param {string} value Original string.
 *
 * @return {string} Escaped string.
 */
function escapeQuotationMark(value) {
  return value.replace(/"/g, '&quot;');
}

/**
 * Returns a string with less-than sign replaced.
 *
 * @param {string} value Original string.
 *
 * @return {string} Escaped string.
 */
function escapeLessThan(value) {
  return value.replace(/</g, '&lt;');
}

/**
 * Returns an escaped attribute value.
 *
 * @see https://w3c.github.io/html/syntax.html#elements-attributes
 *
 * "[...] the text cannot contain an ambiguous ampersand [...] must not contain
 * any literal U+0022 QUOTATION MARK characters (")"
 *
 * Note we also escape the greater than symbol, as this is used by wptexturize to
 * split HTML strings. This is a WordPress specific fix
 *
 * Note that if a resolution for Trac#45387 comes to fruition, it is no longer
 * necessary for `__unstableEscapeGreaterThan` to be used.
 *
 * See: https://core.trac.wordpress.org/ticket/45387
 *
 * @param {string} value Attribute value.
 *
 * @return {string} Escaped attribute value.
 */
function escapeAttribute(value) {
  return (0,_escape_greater__WEBPACK_IMPORTED_MODULE_0__["default"])(escapeQuotationMark(escapeAmpersand(value)));
}

/**
 * Returns an escaped HTML element value.
 *
 * @see https://w3c.github.io/html/syntax.html#writing-html-documents-elements
 *
 * "the text must not contain the character U+003C LESS-THAN SIGN (<) or an
 * ambiguous ampersand."
 *
 * @param {string} value Element value.
 *
 * @return {string} Escaped HTML element value.
 */
function escapeHTML(value) {
  return escapeLessThan(escapeAmpersand(value));
}

/**
 * Returns an escaped Editable HTML element value. This is different from
 * `escapeHTML`, because for editable HTML, ALL ampersands must be escaped in
 * order to render the content correctly on the page.
 *
 * @param {string} value Element value.
 *
 * @return {string} Escaped HTML element value.
 */
function escapeEditableHTML(value) {
  return escapeLessThan(value.replace(/&/g, '&amp;'));
}

/**
 * Returns true if the given attribute name is valid, or false otherwise.
 *
 * @param {string} name Attribute name to test.
 *
 * @return {boolean} Whether attribute is valid.
 */
function isValidAttributeName(name) {
  return !REGEXP_INVALID_ATTRIBUTE_NAME.test(name);
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!****************************!*\
  !*** ./src/js/brackets.js ***!
  \****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_escape_html__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/escape-html */ "./node_modules/@wordpress/escape-html/build-module/index.js");
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
/**
 * Handles rendering the content for tournament brackets.
 *
 * @link       https://www.tournamatch.com
 * @since      4.0.0
 *
 * @package    Tournamatch
 *
 */

(function () {
  'use strict';

  var options = trn_brackets_options;
  function get_competitors(tournament_id) {
    return fetch("".concat(options.site_url, "/wp-json/tournamatch/v1/tournament-competitors/?tournament_id=").concat(tournament_id, "&_embed"), {
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      }
    }).then(function (response) {
      return response.json();
    });
  }
  function get_matches(tournament_id) {
    return fetch("".concat(options.site_url, "/wp-json/tournamatch/v1/matches/?competition_type=tournaments&competition_id=").concat(tournament_id, "&_embed"), {
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      }
    }).then(function (response) {
      return response.json();
    });
  }
  function clear(tournament_id, match_id) {
    return fetch("".concat(options.site_url, "/wp-json/tournamatch/v1/matches/clear"), {
      headers: {
        "Content-Type": "application/json; charset=utf-8",
        "X-WP-Nonce": options.rest_nonce
      },
      method: 'POST',
      body: JSON.stringify({
        id: match_id,
        tournament_id: tournament_id
      })
    }).then(function (response) {
      return response.json();
    });
  }
  function advance(tournament_id, match_id, winner_id) {
    return fetch("".concat(options.site_url, "/wp-json/tournamatch/v1/matches/advance"), {
      headers: {
        "Content-Type": "application/json; charset=utf-8",
        "X-WP-Nonce": options.rest_nonce
      },
      method: 'POST',
      body: JSON.stringify({
        id: match_id,
        tournament_id: tournament_id,
        winner_id: winner_id
      })
    }).then(function (response) {
      return response.json();
    });
  }
  window.addEventListener('load', function () {
    function competitorMouseOver(event) {
      var className = "trn-brackets-competitor-".concat(event.target.dataset.competitorId);
      Array.from(document.getElementsByClassName(className)).forEach(function (item) {
        item.classList.add('trn-brackets-competitor-highlight');
      });
    }
    function competitorMouseLeave(event) {
      var className = "trn-brackets-competitor-".concat(event.target.dataset.competitorId);
      Array.from(document.getElementsByClassName(className)).forEach(function (item) {
        item.classList.remove('trn-brackets-competitor-highlight');
      });
    }
    function calculateProgress(tournament) {
      var totalGames = tournament.size - 1;
      var finishedGames = 0;
      for (var i = 1; i <= tournament.size - 1; i++) {
        if (tournament.matches[i]) {
          if (tournament.matches[i].match_status === 'confirmed') finishedGames++;
        }
      }
      return finishedGames / totalGames;
    }
    function renderProgress(_float) {
      return "<div class=\"trn-brackets-progress\" style=\"width: ".concat(100 * _float, "%;\">&nbsp;</div> ");
    }
    function renderDropDown(tournament, tournament_id, spot_id) {
      var content = "";
      var is_first_round = spot_id < tournament.size / 2;
      if (tournament.matches[spot_id] && (tournament.matches[spot_id].one_competitor_id !== null || tournament.matches[spot_id].two_competitor_id !== null)) {
        var match_id = tournament.matches[spot_id].match_id;
        content += "<div class=\"trn-brackets-dropdown\">";
        content += "<span class=\"trn-brackets-more-details dashicons dashicons-admin-generic\"></span>";
        content += "<div class=\"trn-brackets-dropdown-content\" >";
        if (tournament.matches[spot_id] && tournament.matches[spot_id].one_competitor_id !== null && tournament.matches[spot_id].one_competitor_id !== 0) {
          var one_id = tournament.matches[spot_id].one_competitor_id;
          var advance_url = options.advance_url.replace('{ID}', match_id).replace('{WINNER_ID}', one_id).replace('{NONCE}', options.advance_nonce);
          var replace_url = options.replace_url.replace('{TOURNAMENT_ID}', tournament_id).replace('{MATCH_ID}', match_id).replace('{COMPETITOR_ID}', one_id).replace('{NONCE}', options.replace_nonce);
          content += "<a href=\"".concat(advance_url, "\" class=\"advance-competitor\" data-tournament-id=\"").concat(tournament_id, "\" data-match-id=\"").concat(spot_id, "\" data-competitor-id=\"").concat(one_id, "\">").concat(options.language.advance.replace('{NAME}', tournament.competitors[one_id].name), "</a>");
          content += "<a href=\"".concat(replace_url, "\" class=\"replace-competitor\" data-tournament-id=\"").concat(tournament_id, "\" data-match-id=\"").concat(spot_id, "\" data-competitor-id=\"").concat(one_id, "\">").concat(options.language.replace.replace('{NAME}', tournament.competitors[one_id].name), "</a>");
        }
        if (tournament.matches[spot_id] && tournament.matches[spot_id].two_competitor_id !== null && tournament.matches[spot_id].two_competitor_id !== 0) {
          var two_id = tournament.matches[spot_id].two_competitor_id;
          var _advance_url = options.advance_url.replace('{ID}', match_id).replace('{WINNER_ID}', two_id).replace('{NONCE}', options.advance_nonce);
          var _replace_url = options.replace_url.replace('{TOURNAMENT_ID}', tournament_id).replace('{MATCH_ID}', match_id).replace('{COMPETITOR_ID}', two_id).replace('{NONCE}', options.replace_nonce);
          content += "<a href=\"".concat(_advance_url, "\" class=\"advance-competitor\" data-tournament-id=\"").concat(tournament_id, "\" data-match-id=\"").concat(spot_id, "\" data-competitor-id=\"").concat(two_id, "\">").concat(options.language.advance.replace('{NAME}', tournament.competitors[two_id].name), "</a>");
          content += "<a href=\"".concat(_replace_url, "\" class=\"replace-competitor\" data-tournament-id=\"").concat(tournament_id, "\" data-match-id=\"").concat(spot_id, "\" data-competitor-id=\"").concat(two_id, "\">").concat(options.language.replace.replace('{NAME}', tournament.competitors[two_id].name), "</a>");
        }
        if (!is_first_round) {
          var clear_url = options.clear_url.replace('{ID}', match_id).replace('{NONCE}', options.clear_nonce);
          content += "<a href=\"".concat(clear_url, "\" class=\"clear-competitors\" data-tournament-id=\"").concat(tournament_id, "\" data-match-id=\"").concat(spot_id, "\">").concat(options.language.clear, "</a>");
        }
        content += "</div>";
        content += "</div>";
      }
      return content;
    }
    function renderMatch(tournament, tournament_id, match_id, flow, can_edit_matches) {
      var undecided = options.undecided && options.undecided.length > 0 ? options.undecided : '&nbsp;';
      var content = "";
      content += "<div class=\"trn-brackets-match\">";
      content += "<div class=\"trn-brackets-horizontal-line\"></div>";
      content += "<div class=\"trn-brackets-match-body\">";
      if (tournament.matches[match_id] && tournament.matches[match_id].one_competitor_id !== null && tournament.matches[match_id].one_competitor_id !== 0) {
        var one_id = tournament.matches[match_id].one_competitor_id;
        var one_name = tournament.competitors[one_id] ? tournament.competitors[one_id].name : '&nbsp;';
        var competitor_url_prefix = 'players' === tournament.matches[match_id].one_competitor_type ? options.routes.players : options.routes.teams;
        var one_url = tournament.competitors[one_id] ? "".concat(options.site_url, "/").concat(competitor_url_prefix, "/").concat(one_id) : "#";
        content += "<span id=\"trn_spot_".concat(match_id, "_one\" class=\"trn-brackets-competitor trn-brackets-competitor-").concat(one_id, "\" data-competitor-id=\"").concat(one_id, "\"><a href=\"").concat(one_url, "\">").concat(one_name, "</a></span>");
      } else {
        content += "<span id=\"trn_spot_".concat(match_id, "_one\" class=\"trn-brackets-competitor\">").concat(undecided, "</span>");
      }
      if (tournament.matches[match_id] && tournament.matches[match_id].two_competitor_id !== null && tournament.matches[match_id].two_competitor_id !== 0) {
        var two_id = tournament.matches[match_id].two_competitor_id;
        var two_name = tournament.competitors[two_id] ? tournament.competitors[two_id].name : '&nbsp;';
        var _competitor_url_prefix = 'players' === tournament.matches[match_id].two_competitor_type ? options.routes.players : options.routes.teams;
        var two_url = tournament.competitors[two_id] ? "".concat(options.site_url, "/").concat(_competitor_url_prefix, "/").concat(two_id) : "#";
        content += "<span id=\"trn_spot_".concat(match_id, "_two\" class=\"trn-brackets-competitor trn-brackets-competitor-").concat(two_id, "\" data-competitor-id=\"").concat(two_id, "\"><a href=\"").concat(two_url, "\">").concat(two_name, "</a></span>");
      } else {
        content += "<span id=\"trn_spot_".concat(match_id, "_two\" class=\"trn-brackets-competitor\">").concat(undecided, "</span>");
      }
      content += "</div>";
      if (flow) {
        if (0 === match_id % 2) {
          content += "<div class=\"trn-brackets-bottom-half\">";
        } else {
          content += "<div class=\"trn-brackets-top-half\">";
        }
        if (can_edit_matches) {
          content += renderDropDown(tournament, tournament_id, match_id);
        }
        content += "</div>";
      }
      content += "</div>";
      return content;
    }
    function renderBrackets(tournament, container, tournament_id) {
      var content = "";
      var numberOfGames;
      var matchPaddingCount;
      container.dataset.trnTotalRounds = tournament.rounds;
      content += "<div class=\"trn-brackets-round-header-container\">";
      for (var i = 0; i <= tournament.rounds; i++) {
        content += "<span class=\"trn-brackets-round-header\">".concat(options.language.rounds[i], "</span>");
      }
      content += "</div>";
      content += renderProgress(calculateProgress(tournament));
      content += "<div class=\"trn-brackets-round-body-container\">";
      var spot = 1;
      var sumOfGames = 0;
      for (var round = 1; round <= tournament.rounds; round++) {
        numberOfGames = Math.ceil(tournament.size / Math.pow(2, round));
        matchPaddingCount = Math.pow(2, round) - 1;
        content += "<div class=\"trn-brackets-round-body\">";
        for (spot; spot <= numberOfGames + sumOfGames; spot++) {
          for (var padding = 0; padding < matchPaddingCount; padding++) {
            if (1 === spot % 2) {
              content += "<div class=\"trn-brackets-match-half\">&nbsp;</div> ";
            } else {
              content += "<div class=\"trn-brackets-vertical-line\">&nbsp;</div> ";
            }
          }
          content += renderMatch(tournament, tournament_id, spot, round !== tournament.rounds, options.can_edit_matches);
          for (var _padding = 0; _padding < matchPaddingCount; _padding++) {
            if (round !== tournament.rounds && 1 === spot % 2) {
              content += "<div class=\"trn-brackets-vertical-line\">&nbsp;</div> ";
            } else {
              content += "<div class=\"trn-brackets-match-half\">&nbsp;</div> ";
            }
          }
        }
        content += "</div>";
        sumOfGames += numberOfGames;
      }

      // Display the last winner's spot.
      content += "<div class=\"trn-brackets-round-body\">";
      for (var _padding2 = 0; _padding2 < matchPaddingCount; _padding2++) {
        content += "<div class=\"trn-brackets-match-half\">&nbsp;</div> ";
      }
      content += "<div class=\"trn-brackets-match\">";
      content += "<div class=\"trn-brackets-winners-line\">";
      if (options.can_edit_matches) {
        content += renderDropDown(tournament, tournament_id, spot - 1);
      }
      content += "</div>";
      content += "<div class=\"trn-brackets-match-body\">";
      content += "<span class=\"trn-brackets-competitor\"><strong>".concat(options.language.winner, "</strong></span>");
      if (tournament.matches[spot - 1] && tournament.matches[spot - 1].match_status === 'confirmed') {
        //if (tournament.matches[spot] && tournament.matches[spot].one_competitor_id !== null) {
        var winner_id = tournament.matches[spot - 1].one_result === 'won' ? tournament.matches[spot - 1].one_competitor_id : tournament.matches[spot - 1].two_competitor_id;
        content += "<span class=\"trn-brackets-competitor competitor-".concat(winner_id, "\" data-competitor-id=\"").concat(winner_id, "\">").concat(tournament.competitors[winner_id].name, "</span>");
      } else {
        content += "<span class=\"trn-brackets-competitor\">&nbsp;</span>";
      }
      content += "</div>";
      content += "</div>";
      for (var _padding3 = 0; _padding3 < matchPaddingCount; _padding3++) {
        content += "<div class=\"trn-brackets-match-half\">&nbsp;</div> ";
      }
      content += "</div>";
      // End of display last winner's spot.

      content += "</div>";
      container.innerHTML = content;
      Array.from(document.getElementsByClassName('trn-brackets-competitor')).forEach(function (item) {
        item.addEventListener('mouseover', competitorMouseOver);
        item.addEventListener('mouseleave', competitorMouseLeave);
      });

      // Array.from(document.getElementsByClassName('advance-competitor'))
      //     .forEach(
      //         (item) => {
      //             item.addEventListener('click', (e) => {
      //                 e.preventDefault();
      //                 advance(e.target.dataset.tournamentId, e.target.dataset.matchId, e.target.dataset.competitorId)
      //                     .then(() => {
      //                         location.reload();
      //                     });
      //             });
      //         }
      //     );
      //
      // Array.from(document.getElementsByClassName('clear-competitors'))
      //     .forEach(
      //         (item) => {
      //             item.addEventListener('click', (e) => {
      //                 e.preventDefault();
      //                 clear(e.target.dataset.tournamentId, e.target.dataset.matchId)
      //                     .then(() => {
      //                         location.reload();
      //                     });
      //             });
      //         }
      //     );
    }
    Array.from(document.getElementsByClassName('trn-brackets')).forEach(function (item) {
      var tournamentId = parseInt(item.dataset.tournamentId);
      var tournamentSize = parseInt(item.dataset.tournamentSize);
      Promise.all([get_matches(tournamentId), get_competitors(tournamentId)]).then(function (_ref) {
        var _ref2 = _slicedToArray(_ref, 2),
          matches = _ref2[0],
          competitors = _ref2[1];
        var rounds = Math.round(Math.log(tournamentSize) / Math.log(2));
        console.log(competitors);
        competitors = competitors.reduce(function (competitors, competitor) {
          return competitor.name = (0,_wordpress_escape_html__WEBPACK_IMPORTED_MODULE_0__.escapeHTML)(competitor._embedded.competitor[0].name), competitors[competitor.competitor_id] = competitor, competitors;
        }, {});
        console.log(competitors);
        console.log(matches);
        matches = matches.reduce(function (matches, match) {
          return matches[match.spot] = match, matches;
        }, {});
        console.log(matches);
        var tournament = {
          matches: matches,
          competitors: competitors,
          rounds: rounds,
          size: tournamentSize
        };
        console.log(tournament);
        renderBrackets(tournament, item, tournamentId);
      });
    });
  }, false);
})();
})();

/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUFHQSxPQUFPLENBQUM2RCxNQUFNLENBQUMsVUFBQzdELE9BQU8sRUFBRWlFLEtBQUs7VUFBQSxPQUFNakUsT0FBTyxDQUFDaUUsS0FBSyxDQUFDeEIsSUFBSSxDQUFDLEdBQUd3QixLQUFLLEVBQUVqRSxPQUFPO1FBQUEsQ0FBQyxFQUFFLENBQUMsQ0FBQyxDQUFDO1FBQ3hGNEQsT0FBTyxDQUFDRCxHQUFHLENBQUMzRCxPQUFPLENBQUM7UUFFcEIsSUFBTUwsVUFBVSxHQUFHO1VBQ2ZLLE9BQU8sRUFBRUEsT0FBTztVQUNoQmdCLFdBQVcsRUFBRUEsV0FBVztVQUN4QndCLE1BQU0sRUFBRUEsTUFBTTtVQUNkM0MsSUFBSSxFQUFFd0Q7UUFDVixDQUFDO1FBRURPLE9BQU8sQ0FBQ0QsR0FBRyxDQUFDaEUsVUFBVSxDQUFDO1FBRXZCd0MsY0FBYyxDQUFDeEMsVUFBVSxFQUFFTixJQUFJLEVBQUU4RCxZQUFZLENBQUM7TUFDbEQsQ0FBQyxDQUFDO0lBQ1YsQ0FDSixDQUFDO0VBRVQsQ0FBQyxFQUNELEtBQ0osQ0FBQztBQUNMLENBQUMsRUFBRSxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly90b3VybmFtYXRjaC9Ad29yZHByZXNzL2VzY2FwZS1odG1sL3NyYy9lc2NhcGUtZ3JlYXRlci5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC9Ad29yZHByZXNzL2VzY2FwZS1odG1sL3NyYy9pbmRleC5qcyIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL2Jvb3RzdHJhcCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvZGVmaW5lIHByb3BlcnR5IGdldHRlcnMiLCJ3ZWJwYWNrOi8vdG91cm5hbWF0Y2gvd2VicGFjay9ydW50aW1lL2hhc093blByb3BlcnR5IHNob3J0aGFuZCIsIndlYnBhY2s6Ly90b3VybmFtYXRjaC93ZWJwYWNrL3J1bnRpbWUvbWFrZSBuYW1lc3BhY2Ugb2JqZWN0Iiwid2VicGFjazovL3RvdXJuYW1hdGNoLy4vc3JjL2pzL2JyYWNrZXRzLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGdyZWF0ZXItdGhhbiBzaWduIHJlcGxhY2VkLlxuICpcbiAqIE5vdGUgdGhhdCBpZiBhIHJlc29sdXRpb24gZm9yIFRyYWMjNDUzODcgY29tZXMgdG8gZnJ1aXRpb24sIGl0IGlzIG5vIGxvbmdlclxuICogbmVjZXNzYXJ5IGZvciBgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuYCB0byBleGlzdC5cbiAqXG4gKiBTZWU6IGh0dHBzOi8vY29yZS50cmFjLndvcmRwcmVzcy5vcmcvdGlja2V0LzQ1Mzg3XG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIE9yaWdpbmFsIHN0cmluZy5cbiAqXG4gKiBAcmV0dXJuIHtzdHJpbmd9IEVzY2FwZWQgc3RyaW5nLlxuICovXG5leHBvcnQgZGVmYXVsdCBmdW5jdGlvbiBfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4oIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLz4vZywgJyZndDsnICk7XG59XG4iLCIvKipcbiAqIEludGVybmFsIGRlcGVuZGVuY2llc1xuICovXG5pbXBvcnQgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuIGZyb20gJy4vZXNjYXBlLWdyZWF0ZXInO1xuXG4vKipcbiAqIFJlZ3VsYXIgZXhwcmVzc2lvbiBtYXRjaGluZyBpbnZhbGlkIGF0dHJpYnV0ZSBuYW1lcy5cbiAqXG4gKiBcIkF0dHJpYnV0ZSBuYW1lcyBtdXN0IGNvbnNpc3Qgb2Ygb25lIG9yIG1vcmUgY2hhcmFjdGVycyBvdGhlciB0aGFuIGNvbnRyb2xzLFxuICogVSswMDIwIFNQQUNFLCBVKzAwMjIgKFwiKSwgVSswMDI3ICgnKSwgVSswMDNFICg+KSwgVSswMDJGICgvKSwgVSswMDNEICg9KSxcbiAqIGFuZCBub25jaGFyYWN0ZXJzLlwiXG4gKlxuICogQHNlZSBodHRwczovL2h0bWwuc3BlYy53aGF0d2cub3JnL211bHRpcGFnZS9zeW50YXguaHRtbCNhdHRyaWJ1dGVzLTJcbiAqXG4gKiBAdHlwZSB7UmVnRXhwfVxuICovXG5jb25zdCBSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRSA9IC9bXFx1MDA3Ri1cXHUwMDlGIFwiJz4vPVwiXFx1RkREMC1cXHVGREVGXS87XG5cbi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGFtcGVyc2FuZHMgZXNjYXBlZC4gTm90ZSB0aGF0IHRoaXMgaXMgYW4gaW1wZXJmZWN0XG4gKiBpbXBsZW1lbnRhdGlvbiwgd2hlcmUgb25seSBhbXBlcnNhbmRzIHdoaWNoIGRvIG5vdCBhcHBlYXIgYXMgYSBwYXR0ZXJuIG9mXG4gKiBuYW1lZCwgZGVjaW1hbCwgb3IgaGV4YWRlY2ltYWwgY2hhcmFjdGVyIHJlZmVyZW5jZXMgYXJlIGVzY2FwZWQuIEludmFsaWRcbiAqIG5hbWVkIHJlZmVyZW5jZXMgKGkuZS4gYW1iaWd1b3VzIGFtcGVyc2FuZCkgYXJlIHN0aWxsIHBlcm1pdHRlZC5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2NoYXJhY3Rlci1yZWZlcmVuY2VzXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI2FtYmlndW91cy1hbXBlcnNhbmRcbiAqIEBzZWUgaHR0cHM6Ly93M2MuZ2l0aHViLmlvL2h0bWwvc3ludGF4Lmh0bWwjbmFtZWQtY2hhcmFjdGVyLXJlZmVyZW5jZXNcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgT3JpZ2luYWwgc3RyaW5nLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBzdHJpbmcuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVBbXBlcnNhbmQoIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggLyYoPyEoW2EtejAtOV0rfCNbMC05XSt8I3hbYS1mMC05XSspOykvZ2ksICcmYW1wOycgKTtcbn1cblxuLyoqXG4gKiBSZXR1cm5zIGEgc3RyaW5nIHdpdGggcXVvdGF0aW9uIG1hcmtzIHJlcGxhY2VkLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZVF1b3RhdGlvbk1hcmsoIHZhbHVlICkge1xuXHRyZXR1cm4gdmFsdWUucmVwbGFjZSggL1wiL2csICcmcXVvdDsnICk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhIHN0cmluZyB3aXRoIGxlc3MtdGhhbiBzaWduIHJlcGxhY2VkLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBPcmlnaW5hbCBzdHJpbmcuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIHN0cmluZy5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUxlc3NUaGFuKCB2YWx1ZSApIHtcblx0cmV0dXJuIHZhbHVlLnJlcGxhY2UoIC88L2csICcmbHQ7JyApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYW4gZXNjYXBlZCBhdHRyaWJ1dGUgdmFsdWUuXG4gKlxuICogQHNlZSBodHRwczovL3czYy5naXRodWIuaW8vaHRtbC9zeW50YXguaHRtbCNlbGVtZW50cy1hdHRyaWJ1dGVzXG4gKlxuICogXCJbLi4uXSB0aGUgdGV4dCBjYW5ub3QgY29udGFpbiBhbiBhbWJpZ3VvdXMgYW1wZXJzYW5kIFsuLi5dIG11c3Qgbm90IGNvbnRhaW5cbiAqIGFueSBsaXRlcmFsIFUrMDAyMiBRVU9UQVRJT04gTUFSSyBjaGFyYWN0ZXJzIChcIilcIlxuICpcbiAqIE5vdGUgd2UgYWxzbyBlc2NhcGUgdGhlIGdyZWF0ZXIgdGhhbiBzeW1ib2wsIGFzIHRoaXMgaXMgdXNlZCBieSB3cHRleHR1cml6ZSB0b1xuICogc3BsaXQgSFRNTCBzdHJpbmdzLiBUaGlzIGlzIGEgV29yZFByZXNzIHNwZWNpZmljIGZpeFxuICpcbiAqIE5vdGUgdGhhdCBpZiBhIHJlc29sdXRpb24gZm9yIFRyYWMjNDUzODcgY29tZXMgdG8gZnJ1aXRpb24sIGl0IGlzIG5vIGxvbmdlclxuICogbmVjZXNzYXJ5IGZvciBgX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuYCB0byBiZSB1c2VkLlxuICpcbiAqIFNlZTogaHR0cHM6Ly9jb3JlLnRyYWMud29yZHByZXNzLm9yZy90aWNrZXQvNDUzODdcbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gdmFsdWUgQXR0cmlidXRlIHZhbHVlLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBhdHRyaWJ1dGUgdmFsdWUuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVBdHRyaWJ1dGUoIHZhbHVlICkge1xuXHRyZXR1cm4gX191bnN0YWJsZUVzY2FwZUdyZWF0ZXJUaGFuKFxuXHRcdGVzY2FwZVF1b3RhdGlvbk1hcmsoIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSApXG5cdCk7XG59XG5cbi8qKlxuICogUmV0dXJucyBhbiBlc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqXG4gKiBAc2VlIGh0dHBzOi8vdzNjLmdpdGh1Yi5pby9odG1sL3N5bnRheC5odG1sI3dyaXRpbmctaHRtbC1kb2N1bWVudHMtZWxlbWVudHNcbiAqXG4gKiBcInRoZSB0ZXh0IG11c3Qgbm90IGNvbnRhaW4gdGhlIGNoYXJhY3RlciBVKzAwM0MgTEVTUy1USEFOIFNJR04gKDwpIG9yIGFuXG4gKiBhbWJpZ3VvdXMgYW1wZXJzYW5kLlwiXG4gKlxuICogQHBhcmFtIHtzdHJpbmd9IHZhbHVlIEVsZW1lbnQgdmFsdWUuXG4gKlxuICogQHJldHVybiB7c3RyaW5nfSBFc2NhcGVkIEhUTUwgZWxlbWVudCB2YWx1ZS5cbiAqL1xuZXhwb3J0IGZ1bmN0aW9uIGVzY2FwZUhUTUwoIHZhbHVlICkge1xuXHRyZXR1cm4gZXNjYXBlTGVzc1RoYW4oIGVzY2FwZUFtcGVyc2FuZCggdmFsdWUgKSApO1xufVxuXG4vKipcbiAqIFJldHVybnMgYW4gZXNjYXBlZCBFZGl0YWJsZSBIVE1MIGVsZW1lbnQgdmFsdWUuIFRoaXMgaXMgZGlmZmVyZW50IGZyb21cbiAqIGBlc2NhcGVIVE1MYCwgYmVjYXVzZSBmb3IgZWRpdGFibGUgSFRNTCwgQUxMIGFtcGVyc2FuZHMgbXVzdCBiZSBlc2NhcGVkIGluXG4gKiBvcmRlciB0byByZW5kZXIgdGhlIGNvbnRlbnQgY29ycmVjdGx5IG9uIHRoZSBwYWdlLlxuICpcbiAqIEBwYXJhbSB7c3RyaW5nfSB2YWx1ZSBFbGVtZW50IHZhbHVlLlxuICpcbiAqIEByZXR1cm4ge3N0cmluZ30gRXNjYXBlZCBIVE1MIGVsZW1lbnQgdmFsdWUuXG4gKi9cbmV4cG9ydCBmdW5jdGlvbiBlc2NhcGVFZGl0YWJsZUhUTUwoIHZhbHVlICkge1xuXHRyZXR1cm4gZXNjYXBlTGVzc1RoYW4oIHZhbHVlLnJlcGxhY2UoIC8mL2csICcmYW1wOycgKSApO1xufVxuXG4vKipcbiAqIFJldHVybnMgdHJ1ZSBpZiB0aGUgZ2l2ZW4gYXR0cmlidXRlIG5hbWUgaXMgdmFsaWQsIG9yIGZhbHNlIG90aGVyd2lzZS5cbiAqXG4gKiBAcGFyYW0ge3N0cmluZ30gbmFtZSBBdHRyaWJ1dGUgbmFtZSB0byB0ZXN0LlxuICpcbiAqIEByZXR1cm4ge2Jvb2xlYW59IFdoZXRoZXIgYXR0cmlidXRlIGlzIHZhbGlkLlxuICovXG5leHBvcnQgZnVuY3Rpb24gaXNWYWxpZEF0dHJpYnV0ZU5hbWUoIG5hbWUgKSB7XG5cdHJldHVybiAhIFJFR0VYUF9JTlZBTElEX0FUVFJJQlVURV9OQU1FLnRlc3QoIG5hbWUgKTtcbn1cbiIsIi8vIFRoZSBtb2R1bGUgY2FjaGVcbnZhciBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX18gPSB7fTtcblxuLy8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbmZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG5cdHZhciBjYWNoZWRNb2R1bGUgPSBfX3dlYnBhY2tfbW9kdWxlX2NhY2hlX19bbW9kdWxlSWRdO1xuXHRpZiAoY2FjaGVkTW9kdWxlICE9PSB1bmRlZmluZWQpIHtcblx0XHRyZXR1cm4gY2FjaGVkTW9kdWxlLmV4cG9ydHM7XG5cdH1cblx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcblx0dmFyIG1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF0gPSB7XG5cdFx0Ly8gbm8gbW9kdWxlLmlkIG5lZWRlZFxuXHRcdC8vIG5vIG1vZHVsZS5sb2FkZWQgbmVlZGVkXG5cdFx0ZXhwb3J0czoge31cblx0fTtcblxuXHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cblx0X193ZWJwYWNrX21vZHVsZXNfX1ttb2R1bGVJZF0obW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cblx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcblx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xufVxuXG4iLCIvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9ucyBmb3IgaGFybW9ueSBleHBvcnRzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSAoZXhwb3J0cywgZGVmaW5pdGlvbikgPT4ge1xuXHRmb3IodmFyIGtleSBpbiBkZWZpbml0aW9uKSB7XG5cdFx0aWYoX193ZWJwYWNrX3JlcXVpcmVfXy5vKGRlZmluaXRpb24sIGtleSkgJiYgIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBrZXkpKSB7XG5cdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywga2V5LCB7IGVudW1lcmFibGU6IHRydWUsIGdldDogZGVmaW5pdGlvbltrZXldIH0pO1xuXHRcdH1cblx0fVxufTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSAob2JqLCBwcm9wKSA9PiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iaiwgcHJvcCkpIiwiLy8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5yID0gKGV4cG9ydHMpID0+IHtcblx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG5cdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG5cdH1cblx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbn07IiwiLyoqXHJcbiAqIEhhbmRsZXMgcmVuZGVyaW5nIHRoZSBjb250ZW50IGZvciB0b3VybmFtZW50IGJyYWNrZXRzLlxyXG4gKlxyXG4gKiBAbGluayAgICAgICBodHRwczovL3d3dy50b3VybmFtYXRjaC5jb21cclxuICogQHNpbmNlICAgICAgNC4wLjBcclxuICpcclxuICogQHBhY2thZ2UgICAgVG91cm5hbWF0Y2hcclxuICpcclxuICovXHJcbmltcG9ydCB7IGVzY2FwZUhUTUwgfSBmcm9tICdAd29yZHByZXNzL2VzY2FwZS1odG1sJztcclxuXHJcbihmdW5jdGlvbiAoKSB7XHJcbiAgICAndXNlIHN0cmljdCc7XHJcblxyXG4gICAgY29uc3Qgb3B0aW9ucyA9IHRybl9icmFja2V0c19vcHRpb25zO1xyXG5cclxuICAgIGZ1bmN0aW9uIGdldF9jb21wZXRpdG9ycyh0b3VybmFtZW50X2lkKSB7XHJcbiAgICAgICAgcmV0dXJuIGZldGNoKGAke29wdGlvbnMuc2l0ZV91cmx9L3dwLWpzb24vdG91cm5hbWF0Y2gvdjEvdG91cm5hbWVudC1jb21wZXRpdG9ycy8/dG91cm5hbWVudF9pZD0ke3RvdXJuYW1lbnRfaWR9Jl9lbWJlZGAsIHtcclxuICAgICAgICAgICAgaGVhZGVyczoge1wiQ29udGVudC1UeXBlXCI6IFwiYXBwbGljYXRpb24vanNvbjsgY2hhcnNldD11dGYtOFwifSxcclxuICAgICAgICB9KVxyXG4gICAgICAgICAgICAudGhlbihyZXNwb25zZSA9PiByZXNwb25zZS5qc29uKCkpO1xyXG4gICAgfVxyXG5cclxuICAgIGZ1bmN0aW9uIGdldF9tYXRjaGVzKHRvdXJuYW1lbnRfaWQpIHtcclxuICAgICAgICByZXR1cm4gZmV0Y2goYCR7b3B0aW9ucy5zaXRlX3VybH0vd3AtanNvbi90b3VybmFtYXRjaC92MS9tYXRjaGVzLz9jb21wZXRpdGlvbl90eXBlPXRvdXJuYW1lbnRzJmNvbXBldGl0aW9uX2lkPSR7dG91cm5hbWVudF9pZH0mX2VtYmVkYCwge1xyXG4gICAgICAgICAgICBoZWFkZXJzOiB7XCJDb250ZW50LVR5cGVcIjogXCJhcHBsaWNhdGlvbi9qc29uOyBjaGFyc2V0PXV0Zi04XCJ9LFxyXG4gICAgICAgIH0pXHJcbiAgICAgICAgICAgIC50aGVuKHJlc3BvbnNlID0+IHJlc3BvbnNlLmpzb24oKSk7XHJcbiAgICB9XHJcblxyXG4gICAgZnVuY3Rpb24gY2xlYXIodG91cm5hbWVudF9pZCwgbWF0Y2hfaWQpIHtcclxuICAgICAgICByZXR1cm4gZmV0Y2goYCR7b3B0aW9ucy5zaXRlX3VybH0vd3AtanNvbi90b3VybmFtYXRjaC92MS9tYXRjaGVzL2NsZWFyYCwge1xyXG4gICAgICAgICAgICBoZWFkZXJzOiB7XHJcbiAgICAgICAgICAgICAgICBcIkNvbnRlbnQtVHlwZVwiOiBcImFwcGxpY2F0aW9uL2pzb247IGNoYXJzZXQ9dXRmLThcIixcclxuICAgICAgICAgICAgICAgIFwiWC1XUC1Ob25jZVwiOiBvcHRpb25zLnJlc3Rfbm9uY2UsXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgICAgICBib2R5OiBKU09OLnN0cmluZ2lmeSh7XHJcbiAgICAgICAgICAgICAgICBpZDogbWF0Y2hfaWQsXHJcbiAgICAgICAgICAgICAgICB0b3VybmFtZW50X2lkOiB0b3VybmFtZW50X2lkLFxyXG4gICAgICAgICAgICB9KVxyXG4gICAgICAgIH0pXHJcbiAgICAgICAgICAgIC50aGVuKHJlc3BvbnNlID0+IHJlc3BvbnNlLmpzb24oKSk7XHJcbiAgICB9XHJcblxyXG4gICAgZnVuY3Rpb24gYWR2YW5jZSh0b3VybmFtZW50X2lkLCBtYXRjaF9pZCwgd2lubmVyX2lkKSB7XHJcbiAgICAgICAgcmV0dXJuIGZldGNoKGAke29wdGlvbnMuc2l0ZV91cmx9L3dwLWpzb24vdG91cm5hbWF0Y2gvdjEvbWF0Y2hlcy9hZHZhbmNlYCwge1xyXG4gICAgICAgICAgICBoZWFkZXJzOiB7XHJcbiAgICAgICAgICAgICAgICBcIkNvbnRlbnQtVHlwZVwiOiBcImFwcGxpY2F0aW9uL2pzb247IGNoYXJzZXQ9dXRmLThcIixcclxuICAgICAgICAgICAgICAgIFwiWC1XUC1Ob25jZVwiOiBvcHRpb25zLnJlc3Rfbm9uY2UsXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgICAgICBib2R5OiBKU09OLnN0cmluZ2lmeSh7XHJcbiAgICAgICAgICAgICAgICBpZDogbWF0Y2hfaWQsXHJcbiAgICAgICAgICAgICAgICB0b3VybmFtZW50X2lkOiB0b3VybmFtZW50X2lkLFxyXG4gICAgICAgICAgICAgICAgd2lubmVyX2lkOiB3aW5uZXJfaWQsXHJcbiAgICAgICAgICAgIH0pXHJcbiAgICAgICAgfSlcclxuICAgICAgICAgICAgLnRoZW4ocmVzcG9uc2UgPT4gcmVzcG9uc2UuanNvbigpKTtcclxuICAgIH1cclxuXHJcbiAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcihcclxuICAgICAgICAnbG9hZCcsXHJcbiAgICAgICAgZnVuY3Rpb24gKCkge1xyXG5cclxuICAgICAgICAgICAgZnVuY3Rpb24gY29tcGV0aXRvck1vdXNlT3ZlcihldmVudCkge1xyXG4gICAgICAgICAgICAgICAgY29uc3QgY2xhc3NOYW1lID0gYHRybi1icmFja2V0cy1jb21wZXRpdG9yLSR7ZXZlbnQudGFyZ2V0LmRhdGFzZXQuY29tcGV0aXRvcklkfWA7XHJcbiAgICAgICAgICAgICAgICBBcnJheS5mcm9tKGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoY2xhc3NOYW1lKSlcclxuICAgICAgICAgICAgICAgICAgICAuZm9yRWFjaChcclxuICAgICAgICAgICAgICAgICAgICAgICAgaXRlbSA9PiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpdGVtLmNsYXNzTGlzdC5hZGQoJ3Rybi1icmFja2V0cy1jb21wZXRpdG9yLWhpZ2hsaWdodCcpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgZnVuY3Rpb24gY29tcGV0aXRvck1vdXNlTGVhdmUoZXZlbnQpIHtcclxuICAgICAgICAgICAgICAgIGNvbnN0IGNsYXNzTmFtZSA9IGB0cm4tYnJhY2tldHMtY29tcGV0aXRvci0ke2V2ZW50LnRhcmdldC5kYXRhc2V0LmNvbXBldGl0b3JJZH1gO1xyXG4gICAgICAgICAgICAgICAgQXJyYXkuZnJvbShkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKGNsYXNzTmFtZSkpXHJcbiAgICAgICAgICAgICAgICAgICAgLmZvckVhY2goXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW0gPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaXRlbS5jbGFzc0xpc3QucmVtb3ZlKCd0cm4tYnJhY2tldHMtY29tcGV0aXRvci1oaWdobGlnaHQnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIGNhbGN1bGF0ZVByb2dyZXNzKHRvdXJuYW1lbnQpIHtcclxuICAgICAgICAgICAgICAgIGNvbnN0IHRvdGFsR2FtZXMgPSB0b3VybmFtZW50LnNpemUgLSAxO1xyXG4gICAgICAgICAgICAgICAgbGV0IGZpbmlzaGVkR2FtZXMgPSAwO1xyXG5cclxuICAgICAgICAgICAgICAgIGZvciAobGV0IGkgPSAxOyBpIDw9IHRvdXJuYW1lbnQuc2l6ZSAtIDE7IGkrKykge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh0b3VybmFtZW50Lm1hdGNoZXNbaV0pIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHRvdXJuYW1lbnQubWF0Y2hlc1tpXS5tYXRjaF9zdGF0dXMgPT09ICdjb25maXJtZWQnKSBmaW5pc2hlZEdhbWVzKys7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgcmV0dXJuIChmaW5pc2hlZEdhbWVzIC8gdG90YWxHYW1lcyk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIHJlbmRlclByb2dyZXNzKGZsb2F0KSB7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtcHJvZ3Jlc3NcIiBzdHlsZT1cIndpZHRoOiAkezEwMCAqIGZsb2F0fSU7XCI+Jm5ic3A7PC9kaXY+IGA7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIHJlbmRlckRyb3BEb3duKHRvdXJuYW1lbnQsIHRvdXJuYW1lbnRfaWQsIHNwb3RfaWQpIHtcclxuICAgICAgICAgICAgICAgIGxldCBjb250ZW50ID0gYGA7XHJcbiAgICAgICAgICAgICAgICBjb25zdCBpc19maXJzdF9yb3VuZCA9IHNwb3RfaWQgPCAodG91cm5hbWVudC5zaXplIC8gMik7XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKHRvdXJuYW1lbnQubWF0Y2hlc1tzcG90X2lkXSAmJiAoKHRvdXJuYW1lbnQubWF0Y2hlc1tzcG90X2lkXS5vbmVfY29tcGV0aXRvcl9pZCAhPT0gbnVsbCkgfHwgKHRvdXJuYW1lbnQubWF0Y2hlc1tzcG90X2lkXS50d29fY29tcGV0aXRvcl9pZCAhPT0gbnVsbCkpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgbWF0Y2hfaWQgPSB0b3VybmFtZW50Lm1hdGNoZXNbc3BvdF9pZF0ubWF0Y2hfaWQ7XHJcbiAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPGRpdiBjbGFzcz1cInRybi1icmFja2V0cy1kcm9wZG93blwiPmA7XHJcbiAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPHNwYW4gY2xhc3M9XCJ0cm4tYnJhY2tldHMtbW9yZS1kZXRhaWxzIGRhc2hpY29ucyBkYXNoaWNvbnMtYWRtaW4tZ2VuZXJpY1wiPjwvc3Bhbj5gO1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtZHJvcGRvd24tY29udGVudFwiID5gO1xyXG4gICAgICAgICAgICAgICAgICAgIGlmICh0b3VybmFtZW50Lm1hdGNoZXNbc3BvdF9pZF0gJiYgdG91cm5hbWVudC5tYXRjaGVzW3Nwb3RfaWRdLm9uZV9jb21wZXRpdG9yX2lkICE9PSBudWxsICYmIHRvdXJuYW1lbnQubWF0Y2hlc1tzcG90X2lkXS5vbmVfY29tcGV0aXRvcl9pZCAhPT0gMCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zdCBvbmVfaWQgPSB0b3VybmFtZW50Lm1hdGNoZXNbc3BvdF9pZF0ub25lX2NvbXBldGl0b3JfaWQ7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnN0IGFkdmFuY2VfdXJsID0gb3B0aW9ucy5hZHZhbmNlX3VybC5yZXBsYWNlKCd7SUR9JywgbWF0Y2hfaWQpLnJlcGxhY2UoJ3tXSU5ORVJfSUR9Jywgb25lX2lkKS5yZXBsYWNlKCd7Tk9OQ0V9Jywgb3B0aW9ucy5hZHZhbmNlX25vbmNlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgcmVwbGFjZV91cmwgPSBvcHRpb25zLnJlcGxhY2VfdXJsLnJlcGxhY2UoJ3tUT1VSTkFNRU5UX0lEfScsIHRvdXJuYW1lbnRfaWQpLnJlcGxhY2UoJ3tNQVRDSF9JRH0nLCBtYXRjaF9pZCkucmVwbGFjZSgne0NPTVBFVElUT1JfSUR9Jywgb25lX2lkKS5yZXBsYWNlKCd7Tk9OQ0V9Jywgb3B0aW9ucy5yZXBsYWNlX25vbmNlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPGEgaHJlZj1cIiR7YWR2YW5jZV91cmx9XCIgY2xhc3M9XCJhZHZhbmNlLWNvbXBldGl0b3JcIiBkYXRhLXRvdXJuYW1lbnQtaWQ9XCIke3RvdXJuYW1lbnRfaWR9XCIgZGF0YS1tYXRjaC1pZD1cIiR7c3BvdF9pZH1cIiBkYXRhLWNvbXBldGl0b3ItaWQ9XCIke29uZV9pZH1cIj4ke29wdGlvbnMubGFuZ3VhZ2UuYWR2YW5jZS5yZXBsYWNlKCd7TkFNRX0nLCB0b3VybmFtZW50LmNvbXBldGl0b3JzW29uZV9pZF0ubmFtZSl9PC9hPmA7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxhIGhyZWY9XCIke3JlcGxhY2VfdXJsfVwiIGNsYXNzPVwicmVwbGFjZS1jb21wZXRpdG9yXCIgZGF0YS10b3VybmFtZW50LWlkPVwiJHt0b3VybmFtZW50X2lkfVwiIGRhdGEtbWF0Y2gtaWQ9XCIke3Nwb3RfaWR9XCIgZGF0YS1jb21wZXRpdG9yLWlkPVwiJHtvbmVfaWR9XCI+JHtvcHRpb25zLmxhbmd1YWdlLnJlcGxhY2UucmVwbGFjZSgne05BTUV9JywgdG91cm5hbWVudC5jb21wZXRpdG9yc1tvbmVfaWRdLm5hbWUpfTwvYT5gO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICBpZiAodG91cm5hbWVudC5tYXRjaGVzW3Nwb3RfaWRdICYmIHRvdXJuYW1lbnQubWF0Y2hlc1tzcG90X2lkXS50d29fY29tcGV0aXRvcl9pZCAhPT0gbnVsbCAmJiB0b3VybmFtZW50Lm1hdGNoZXNbc3BvdF9pZF0udHdvX2NvbXBldGl0b3JfaWQgIT09IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgdHdvX2lkID0gdG91cm5hbWVudC5tYXRjaGVzW3Nwb3RfaWRdLnR3b19jb21wZXRpdG9yX2lkO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zdCBhZHZhbmNlX3VybCA9IG9wdGlvbnMuYWR2YW5jZV91cmwucmVwbGFjZSgne0lEfScsIG1hdGNoX2lkKS5yZXBsYWNlKCd7V0lOTkVSX0lEfScsIHR3b19pZCkucmVwbGFjZSgne05PTkNFfScsIG9wdGlvbnMuYWR2YW5jZV9ub25jZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnN0IHJlcGxhY2VfdXJsID0gb3B0aW9ucy5yZXBsYWNlX3VybC5yZXBsYWNlKCd7VE9VUk5BTUVOVF9JRH0nLCB0b3VybmFtZW50X2lkKS5yZXBsYWNlKCd7TUFUQ0hfSUR9JywgbWF0Y2hfaWQpLnJlcGxhY2UoJ3tDT01QRVRJVE9SX0lEfScsIHR3b19pZCkucmVwbGFjZSgne05PTkNFfScsIG9wdGlvbnMucmVwbGFjZV9ub25jZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxhIGhyZWY9XCIke2FkdmFuY2VfdXJsfVwiIGNsYXNzPVwiYWR2YW5jZS1jb21wZXRpdG9yXCIgZGF0YS10b3VybmFtZW50LWlkPVwiJHt0b3VybmFtZW50X2lkfVwiIGRhdGEtbWF0Y2gtaWQ9XCIke3Nwb3RfaWR9XCIgZGF0YS1jb21wZXRpdG9yLWlkPVwiJHt0d29faWR9XCI+JHtvcHRpb25zLmxhbmd1YWdlLmFkdmFuY2UucmVwbGFjZSgne05BTUV9JywgdG91cm5hbWVudC5jb21wZXRpdG9yc1t0d29faWRdLm5hbWUpfTwvYT5gO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8YSBocmVmPVwiJHtyZXBsYWNlX3VybH1cIiBjbGFzcz1cInJlcGxhY2UtY29tcGV0aXRvclwiIGRhdGEtdG91cm5hbWVudC1pZD1cIiR7dG91cm5hbWVudF9pZH1cIiBkYXRhLW1hdGNoLWlkPVwiJHtzcG90X2lkfVwiIGRhdGEtY29tcGV0aXRvci1pZD1cIiR7dHdvX2lkfVwiPiR7b3B0aW9ucy5sYW5ndWFnZS5yZXBsYWNlLnJlcGxhY2UoJ3tOQU1FfScsIHRvdXJuYW1lbnQuY29tcGV0aXRvcnNbdHdvX2lkXS5uYW1lKX08L2E+YDtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKCAhaXNfZmlyc3Rfcm91bmQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgY2xlYXJfdXJsID0gb3B0aW9ucy5jbGVhcl91cmwucmVwbGFjZSgne0lEfScsIG1hdGNoX2lkKS5yZXBsYWNlKCd7Tk9OQ0V9Jywgb3B0aW9ucy5jbGVhcl9ub25jZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxhIGhyZWY9XCIke2NsZWFyX3VybH1cIiBjbGFzcz1cImNsZWFyLWNvbXBldGl0b3JzXCIgZGF0YS10b3VybmFtZW50LWlkPVwiJHt0b3VybmFtZW50X2lkfVwiIGRhdGEtbWF0Y2gtaWQ9XCIke3Nwb3RfaWR9XCI+JHtvcHRpb25zLmxhbmd1YWdlLmNsZWFyfTwvYT5gO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPC9kaXY+YDtcclxuICAgICAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8L2Rpdj5gO1xyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIHJldHVybiBjb250ZW50O1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBmdW5jdGlvbiByZW5kZXJNYXRjaCh0b3VybmFtZW50LCB0b3VybmFtZW50X2lkLCBtYXRjaF9pZCwgZmxvdywgY2FuX2VkaXRfbWF0Y2hlcykge1xyXG4gICAgICAgICAgICAgICAgY29uc3QgdW5kZWNpZGVkID0gKG9wdGlvbnMudW5kZWNpZGVkICYmIG9wdGlvbnMudW5kZWNpZGVkLmxlbmd0aCA+IDApID8gb3B0aW9ucy51bmRlY2lkZWQgOiAnJm5ic3A7JztcclxuICAgICAgICAgICAgICAgIGxldCBjb250ZW50ID0gYGA7XHJcbiAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8ZGl2IGNsYXNzPVwidHJuLWJyYWNrZXRzLW1hdGNoXCI+YDtcclxuICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtaG9yaXpvbnRhbC1saW5lXCI+PC9kaXY+YDtcclxuICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtbWF0Y2gtYm9keVwiPmA7XHJcblxyXG5cclxuXHJcbiAgICAgICAgICAgICAgICBpZiAodG91cm5hbWVudC5tYXRjaGVzW21hdGNoX2lkXSAmJiB0b3VybmFtZW50Lm1hdGNoZXNbbWF0Y2hfaWRdLm9uZV9jb21wZXRpdG9yX2lkICE9PSBudWxsICYmIHRvdXJuYW1lbnQubWF0Y2hlc1ttYXRjaF9pZF0ub25lX2NvbXBldGl0b3JfaWQgIT09IDApIHtcclxuICAgICAgICAgICAgICAgICAgICBjb25zdCBvbmVfaWQgPSB0b3VybmFtZW50Lm1hdGNoZXNbbWF0Y2hfaWRdLm9uZV9jb21wZXRpdG9yX2lkO1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnN0IG9uZV9uYW1lID0gdG91cm5hbWVudC5jb21wZXRpdG9yc1tvbmVfaWRdID8gdG91cm5hbWVudC5jb21wZXRpdG9yc1tvbmVfaWRdLm5hbWUgOiAnJm5ic3A7JztcclxuICAgICAgICAgICAgICAgICAgICBjb25zdCBjb21wZXRpdG9yX3VybF9wcmVmaXggPSAncGxheWVycycgPT09IHRvdXJuYW1lbnQubWF0Y2hlc1ttYXRjaF9pZF0ub25lX2NvbXBldGl0b3JfdHlwZSA/IG9wdGlvbnMucm91dGVzLnBsYXllcnMgOiBvcHRpb25zLnJvdXRlcy50ZWFtcztcclxuICAgICAgICAgICAgICAgICAgICBjb25zdCBvbmVfdXJsID0gdG91cm5hbWVudC5jb21wZXRpdG9yc1tvbmVfaWRdID8gYCR7b3B0aW9ucy5zaXRlX3VybH0vJHtjb21wZXRpdG9yX3VybF9wcmVmaXh9LyR7b25lX2lkfWAgOiBcIiNcIjtcclxuICAgICAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8c3BhbiBpZD1cInRybl9zcG90XyR7bWF0Y2hfaWR9X29uZVwiIGNsYXNzPVwidHJuLWJyYWNrZXRzLWNvbXBldGl0b3IgdHJuLWJyYWNrZXRzLWNvbXBldGl0b3ItJHtvbmVfaWR9XCIgZGF0YS1jb21wZXRpdG9yLWlkPVwiJHtvbmVfaWR9XCI+PGEgaHJlZj1cIiR7b25lX3VybH1cIj4ke29uZV9uYW1lfTwvYT48L3NwYW4+YDtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPHNwYW4gaWQ9XCJ0cm5fc3BvdF8ke21hdGNoX2lkfV9vbmVcIiBjbGFzcz1cInRybi1icmFja2V0cy1jb21wZXRpdG9yXCI+JHt1bmRlY2lkZWR9PC9zcGFuPmA7XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKHRvdXJuYW1lbnQubWF0Y2hlc1ttYXRjaF9pZF0gJiYgdG91cm5hbWVudC5tYXRjaGVzW21hdGNoX2lkXS50d29fY29tcGV0aXRvcl9pZCAhPT0gbnVsbCAmJiB0b3VybmFtZW50Lm1hdGNoZXNbbWF0Y2hfaWRdLnR3b19jb21wZXRpdG9yX2lkICE9PSAwKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgdHdvX2lkID0gdG91cm5hbWVudC5tYXRjaGVzW21hdGNoX2lkXS50d29fY29tcGV0aXRvcl9pZDtcclxuICAgICAgICAgICAgICAgICAgICBjb25zdCB0d29fbmFtZSA9IHRvdXJuYW1lbnQuY29tcGV0aXRvcnNbdHdvX2lkXSA/IHRvdXJuYW1lbnQuY29tcGV0aXRvcnNbdHdvX2lkXS5uYW1lIDogJyZuYnNwOyc7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgY29tcGV0aXRvcl91cmxfcHJlZml4ID0gJ3BsYXllcnMnID09PSB0b3VybmFtZW50Lm1hdGNoZXNbbWF0Y2hfaWRdLnR3b19jb21wZXRpdG9yX3R5cGUgPyBvcHRpb25zLnJvdXRlcy5wbGF5ZXJzIDogb3B0aW9ucy5yb3V0ZXMudGVhbXM7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc3QgdHdvX3VybCA9IHRvdXJuYW1lbnQuY29tcGV0aXRvcnNbdHdvX2lkXSA/IGAke29wdGlvbnMuc2l0ZV91cmx9LyR7Y29tcGV0aXRvcl91cmxfcHJlZml4fS8ke3R3b19pZH1gIDogXCIjXCI7XHJcbiAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPHNwYW4gaWQ9XCJ0cm5fc3BvdF8ke21hdGNoX2lkfV90d29cIiBjbGFzcz1cInRybi1icmFja2V0cy1jb21wZXRpdG9yIHRybi1icmFja2V0cy1jb21wZXRpdG9yLSR7dHdvX2lkfVwiIGRhdGEtY29tcGV0aXRvci1pZD1cIiR7dHdvX2lkfVwiPjxhIGhyZWY9XCIke3R3b191cmx9XCI+JHt0d29fbmFtZX08L2E+PC9zcGFuPmA7XHJcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxzcGFuIGlkPVwidHJuX3Nwb3RfJHttYXRjaF9pZH1fdHdvXCIgY2xhc3M9XCJ0cm4tYnJhY2tldHMtY29tcGV0aXRvclwiPiR7dW5kZWNpZGVkfTwvc3Bhbj5gO1xyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDwvZGl2PmA7XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKGZsb3cpIHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoMCA9PT0gbWF0Y2hfaWQgJSAyKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtYm90dG9tLWhhbGZcIj5gO1xyXG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtdG9wLWhhbGZcIj5gO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKGNhbl9lZGl0X21hdGNoZXMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSByZW5kZXJEcm9wRG93bih0b3VybmFtZW50LCB0b3VybmFtZW50X2lkLCBtYXRjaF9pZCk7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8L2Rpdj5gO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgY29udGVudCArPSBgPC9kaXY+YDtcclxuXHJcbiAgICAgICAgICAgICAgICByZXR1cm4gY29udGVudDtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgZnVuY3Rpb24gcmVuZGVyQnJhY2tldHModG91cm5hbWVudCwgY29udGFpbmVyLCB0b3VybmFtZW50X2lkKSB7XHJcbiAgICAgICAgICAgICAgICBsZXQgY29udGVudCA9IGBgO1xyXG4gICAgICAgICAgICAgICAgbGV0IG51bWJlck9mR2FtZXM7XHJcbiAgICAgICAgICAgICAgICBsZXQgbWF0Y2hQYWRkaW5nQ291bnQ7XHJcblxyXG4gICAgICAgICAgICAgICAgY29udGFpbmVyLmRhdGFzZXQudHJuVG90YWxSb3VuZHMgPSB0b3VybmFtZW50LnJvdW5kcztcclxuXHJcbiAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8ZGl2IGNsYXNzPVwidHJuLWJyYWNrZXRzLXJvdW5kLWhlYWRlci1jb250YWluZXJcIj5gO1xyXG4gICAgICAgICAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPD0gdG91cm5hbWVudC5yb3VuZHM7IGkrKykge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxzcGFuIGNsYXNzPVwidHJuLWJyYWNrZXRzLXJvdW5kLWhlYWRlclwiPiR7b3B0aW9ucy5sYW5ndWFnZS5yb3VuZHNbaV19PC9zcGFuPmA7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8L2Rpdj5gO1xyXG4gICAgICAgICAgICAgICAgY29udGVudCArPSByZW5kZXJQcm9ncmVzcyhjYWxjdWxhdGVQcm9ncmVzcyh0b3VybmFtZW50KSk7XHJcblxyXG4gICAgICAgICAgICAgICAgY29udGVudCArPSBgPGRpdiBjbGFzcz1cInRybi1icmFja2V0cy1yb3VuZC1ib2R5LWNvbnRhaW5lclwiPmA7XHJcbiAgICAgICAgICAgICAgICBsZXQgc3BvdCA9IDE7XHJcbiAgICAgICAgICAgICAgICBsZXQgc3VtT2ZHYW1lcyA9IDA7XHJcbiAgICAgICAgICAgICAgICBmb3IgKGxldCByb3VuZCA9IDE7IHJvdW5kIDw9IHRvdXJuYW1lbnQucm91bmRzOyByb3VuZCsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgbnVtYmVyT2ZHYW1lcyA9IE1hdGguY2VpbCh0b3VybmFtZW50LnNpemUgLyAoTWF0aC5wb3coMiwgcm91bmQpKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgbWF0Y2hQYWRkaW5nQ291bnQgPSBNYXRoLnBvdygyLCByb3VuZCkgLSAxO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8ZGl2IGNsYXNzPVwidHJuLWJyYWNrZXRzLXJvdW5kLWJvZHlcIj5gO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICBmb3IgKHNwb3Q7IHNwb3QgPD0gKG51bWJlck9mR2FtZXMgKyBzdW1PZkdhbWVzKTsgc3BvdCsrKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGZvciAobGV0IHBhZGRpbmcgPSAwOyBwYWRkaW5nIDwgbWF0Y2hQYWRkaW5nQ291bnQ7IHBhZGRpbmcrKykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKDEgPT09IHNwb3QgJSAyKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPGRpdiBjbGFzcz1cInRybi1icmFja2V0cy1tYXRjaC1oYWxmXCI+Jm5ic3A7PC9kaXY+IGA7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtdmVydGljYWwtbGluZVwiPiZuYnNwOzwvZGl2PiBgO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gcmVuZGVyTWF0Y2godG91cm5hbWVudCwgdG91cm5hbWVudF9pZCwgc3BvdCwgcm91bmQgIT09IHRvdXJuYW1lbnQucm91bmRzLCBvcHRpb25zLmNhbl9lZGl0X21hdGNoZXMpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBmb3IgKGxldCBwYWRkaW5nID0gMDsgcGFkZGluZyA8IG1hdGNoUGFkZGluZ0NvdW50OyBwYWRkaW5nKyspIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICgocm91bmQgIT09IHRvdXJuYW1lbnQucm91bmRzKSAmJiAoMSA9PT0gc3BvdCAlIDIpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29udGVudCArPSBgPGRpdiBjbGFzcz1cInRybi1icmFja2V0cy12ZXJ0aWNhbC1saW5lXCI+Jm5ic3A7PC9kaXY+IGA7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtbWF0Y2gtaGFsZlwiPiZuYnNwOzwvZGl2PiBgO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDwvZGl2PmA7XHJcbiAgICAgICAgICAgICAgICAgICAgc3VtT2ZHYW1lcyArPSBudW1iZXJPZkdhbWVzO1xyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIC8vIERpc3BsYXkgdGhlIGxhc3Qgd2lubmVyJ3Mgc3BvdC5cclxuICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtcm91bmQtYm9keVwiPmA7XHJcbiAgICAgICAgICAgICAgICBmb3IgKGxldCBwYWRkaW5nID0gMDsgcGFkZGluZyA8IG1hdGNoUGFkZGluZ0NvdW50OyBwYWRkaW5nKyspIHtcclxuICAgICAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8ZGl2IGNsYXNzPVwidHJuLWJyYWNrZXRzLW1hdGNoLWhhbGZcIj4mbmJzcDs8L2Rpdj4gYDtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtbWF0Y2hcIj5gO1xyXG4gICAgICAgICAgICAgICAgY29udGVudCArPSBgPGRpdiBjbGFzcz1cInRybi1icmFja2V0cy13aW5uZXJzLWxpbmVcIj5gO1xyXG4gICAgICAgICAgICAgICAgaWYgKG9wdGlvbnMuY2FuX2VkaXRfbWF0Y2hlcykge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gcmVuZGVyRHJvcERvd24odG91cm5hbWVudCwgdG91cm5hbWVudF9pZCwgc3BvdCAtIDEpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgY29udGVudCArPSBgPC9kaXY+YDtcclxuICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtbWF0Y2gtYm9keVwiPmA7XHJcbiAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8c3BhbiBjbGFzcz1cInRybi1icmFja2V0cy1jb21wZXRpdG9yXCI+PHN0cm9uZz4ke29wdGlvbnMubGFuZ3VhZ2Uud2lubmVyfTwvc3Ryb25nPjwvc3Bhbj5gO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRvdXJuYW1lbnQubWF0Y2hlc1tzcG90IC0gMV0gJiYgdG91cm5hbWVudC5tYXRjaGVzW3Nwb3QgLSAxXS5tYXRjaF9zdGF0dXMgPT09ICdjb25maXJtZWQnKSB7XHJcbiAgICAgICAgICAgICAgICAvL2lmICh0b3VybmFtZW50Lm1hdGNoZXNbc3BvdF0gJiYgdG91cm5hbWVudC5tYXRjaGVzW3Nwb3RdLm9uZV9jb21wZXRpdG9yX2lkICE9PSBudWxsKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc3Qgd2lubmVyX2lkID0gdG91cm5hbWVudC5tYXRjaGVzW3Nwb3QgLTFdLm9uZV9yZXN1bHQgPT09ICd3b24nID8gdG91cm5hbWVudC5tYXRjaGVzW3Nwb3QgLTFdLm9uZV9jb21wZXRpdG9yX2lkIDogdG91cm5hbWVudC5tYXRjaGVzW3Nwb3QgLTFdLnR3b19jb21wZXRpdG9yX2lkO1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxzcGFuIGNsYXNzPVwidHJuLWJyYWNrZXRzLWNvbXBldGl0b3IgY29tcGV0aXRvci0ke3dpbm5lcl9pZH1cIiBkYXRhLWNvbXBldGl0b3ItaWQ9XCIke3dpbm5lcl9pZH1cIj4ke3RvdXJuYW1lbnQuY29tcGV0aXRvcnNbd2lubmVyX2lkXS5uYW1lfTwvc3Bhbj5gO1xyXG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8c3BhbiBjbGFzcz1cInRybi1icmFja2V0cy1jb21wZXRpdG9yXCI+Jm5ic3A7PC9zcGFuPmA7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8L2Rpdj5gO1xyXG4gICAgICAgICAgICAgICAgY29udGVudCArPSBgPC9kaXY+YDtcclxuICAgICAgICAgICAgICAgIGZvciAobGV0IHBhZGRpbmcgPSAwOyBwYWRkaW5nIDwgbWF0Y2hQYWRkaW5nQ291bnQ7IHBhZGRpbmcrKykge1xyXG4gICAgICAgICAgICAgICAgICAgIGNvbnRlbnQgKz0gYDxkaXYgY2xhc3M9XCJ0cm4tYnJhY2tldHMtbWF0Y2gtaGFsZlwiPiZuYnNwOzwvZGl2PiBgO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgY29udGVudCArPSBgPC9kaXY+YDtcclxuICAgICAgICAgICAgICAgIC8vIEVuZCBvZiBkaXNwbGF5IGxhc3Qgd2lubmVyJ3Mgc3BvdC5cclxuXHJcbiAgICAgICAgICAgICAgICBjb250ZW50ICs9IGA8L2Rpdj5gO1xyXG5cclxuICAgICAgICAgICAgICAgIGNvbnRhaW5lci5pbm5lckhUTUwgPSBjb250ZW50O1xyXG5cclxuICAgICAgICAgICAgICAgIEFycmF5LmZyb20oZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLWJyYWNrZXRzLWNvbXBldGl0b3InKSlcclxuICAgICAgICAgICAgICAgICAgICAuZm9yRWFjaChcclxuICAgICAgICAgICAgICAgICAgICAgICAgKGl0ZW0pID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGl0ZW0uYWRkRXZlbnRMaXN0ZW5lcignbW91c2VvdmVyJywgY29tcGV0aXRvck1vdXNlT3Zlcik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpdGVtLmFkZEV2ZW50TGlzdGVuZXIoJ21vdXNlbGVhdmUnLCBjb21wZXRpdG9yTW91c2VMZWF2ZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICApO1xyXG5cclxuICAgICAgICAgICAgICAgIC8vIEFycmF5LmZyb20oZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnYWR2YW5jZS1jb21wZXRpdG9yJykpXHJcbiAgICAgICAgICAgICAgICAvLyAgICAgLmZvckVhY2goXHJcbiAgICAgICAgICAgICAgICAvLyAgICAgICAgIChpdGVtKSA9PiB7XHJcbiAgICAgICAgICAgICAgICAvLyAgICAgICAgICAgICBpdGVtLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKGUpID0+IHtcclxuICAgICAgICAgICAgICAgIC8vICAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgICAgICAvLyAgICAgICAgICAgICAgICAgYWR2YW5jZShlLnRhcmdldC5kYXRhc2V0LnRvdXJuYW1lbnRJZCwgZS50YXJnZXQuZGF0YXNldC5tYXRjaElkLCBlLnRhcmdldC5kYXRhc2V0LmNvbXBldGl0b3JJZClcclxuICAgICAgICAgICAgICAgIC8vICAgICAgICAgICAgICAgICAgICAgLnRoZW4oKCkgPT4ge1xyXG4gICAgICAgICAgICAgICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgbG9jYXRpb24ucmVsb2FkKCk7XHJcbiAgICAgICAgICAgICAgICAvLyAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgLy8gICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAvLyAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIC8vICAgICApO1xyXG4gICAgICAgICAgICAgICAgLy9cclxuICAgICAgICAgICAgICAgIC8vIEFycmF5LmZyb20oZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnY2xlYXItY29tcGV0aXRvcnMnKSlcclxuICAgICAgICAgICAgICAgIC8vICAgICAuZm9yRWFjaChcclxuICAgICAgICAgICAgICAgIC8vICAgICAgICAgKGl0ZW0pID0+IHtcclxuICAgICAgICAgICAgICAgIC8vICAgICAgICAgICAgIGl0ZW0uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoZSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgLy8gICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgIC8vICAgICAgICAgICAgICAgICBjbGVhcihlLnRhcmdldC5kYXRhc2V0LnRvdXJuYW1lbnRJZCwgZS50YXJnZXQuZGF0YXNldC5tYXRjaElkKVxyXG4gICAgICAgICAgICAgICAgLy8gICAgICAgICAgICAgICAgICAgICAudGhlbigoKSA9PiB7XHJcbiAgICAgICAgICAgICAgICAvLyAgICAgICAgICAgICAgICAgICAgICAgICBsb2NhdGlvbi5yZWxvYWQoKTtcclxuICAgICAgICAgICAgICAgIC8vICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAvLyAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgIC8vICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgLy8gICAgICk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIEFycmF5LmZyb20oZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgndHJuLWJyYWNrZXRzJykpXHJcbiAgICAgICAgICAgICAgICAuZm9yRWFjaChcclxuICAgICAgICAgICAgICAgICAgICAoaXRlbSkgPT4ge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zdCB0b3VybmFtZW50SWQgPSBwYXJzZUludChpdGVtLmRhdGFzZXQudG91cm5hbWVudElkKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29uc3QgdG91cm5hbWVudFNpemUgPSBwYXJzZUludChpdGVtLmRhdGFzZXQudG91cm5hbWVudFNpemUpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgUHJvbWlzZS5hbGwoW2dldF9tYXRjaGVzKHRvdXJuYW1lbnRJZCksIGdldF9jb21wZXRpdG9ycyh0b3VybmFtZW50SWQpXSlcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC50aGVuKChbbWF0Y2hlcywgY29tcGV0aXRvcnNdKSA9PiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc3Qgcm91bmRzID0gTWF0aC5yb3VuZChNYXRoLmxvZyh0b3VybmFtZW50U2l6ZSkgLyBNYXRoLmxvZygyKSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGNvbXBldGl0b3JzKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb21wZXRpdG9ycyA9IGNvbXBldGl0b3JzLnJlZHVjZSgoY29tcGV0aXRvcnMsIGNvbXBldGl0b3IpID0+IChcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbXBldGl0b3IubmFtZSA9IGVzY2FwZUhUTUwoY29tcGV0aXRvci5fZW1iZWRkZWQuY29tcGV0aXRvclswXS5uYW1lKSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbXBldGl0b3JzW2NvbXBldGl0b3IuY29tcGV0aXRvcl9pZF0gPSBjb21wZXRpdG9yLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29tcGV0aXRvcnNcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICApLCB7fSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coY29tcGV0aXRvcnMpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhtYXRjaGVzKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBtYXRjaGVzID0gbWF0Y2hlcy5yZWR1Y2UoKG1hdGNoZXMsIG1hdGNoKSA9PiAobWF0Y2hlc1ttYXRjaC5zcG90XSA9IG1hdGNoLCBtYXRjaGVzKSwge30pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKG1hdGNoZXMpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zdCB0b3VybmFtZW50ID0ge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBtYXRjaGVzOiBtYXRjaGVzLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb21wZXRpdG9yczogY29tcGV0aXRvcnMsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJvdW5kczogcm91bmRzLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBzaXplOiB0b3VybmFtZW50U2l6ZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9O1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyh0b3VybmFtZW50KTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVuZGVyQnJhY2tldHModG91cm5hbWVudCwgaXRlbSwgdG91cm5hbWVudElkKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICk7XHJcblxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgZmFsc2VcclxuICAgICk7XHJcbn0pKCk7XHJcbiJdLCJuYW1lcyI6WyJfX3Vuc3RhYmxlRXNjYXBlR3JlYXRlclRoYW4iLCJ2YWx1ZSIsInJlcGxhY2UiLCJSRUdFWFBfSU5WQUxJRF9BVFRSSUJVVEVfTkFNRSIsImVzY2FwZUFtcGVyc2FuZCIsImVzY2FwZVF1b3RhdGlvbk1hcmsiLCJlc2NhcGVMZXNzVGhhbiIsImVzY2FwZUF0dHJpYnV0ZSIsImVzY2FwZUhUTUwiLCJlc2NhcGVFZGl0YWJsZUhUTUwiLCJpc1ZhbGlkQXR0cmlidXRlTmFtZSIsIm5hbWUiLCJ0ZXN0Iiwib3B0aW9ucyIsInRybl9icmFja2V0c19vcHRpb25zIiwiZ2V0X2NvbXBldGl0b3JzIiwidG91cm5hbWVudF9pZCIsImZldGNoIiwiY29uY2F0Iiwic2l0ZV91cmwiLCJoZWFkZXJzIiwidGhlbiIsInJlc3BvbnNlIiwianNvbiIsImdldF9tYXRjaGVzIiwiY2xlYXIiLCJtYXRjaF9pZCIsInJlc3Rfbm9uY2UiLCJtZXRob2QiLCJib2R5IiwiSlNPTiIsInN0cmluZ2lmeSIsImlkIiwiYWR2YW5jZSIsIndpbm5lcl9pZCIsIndpbmRvdyIsImFkZEV2ZW50TGlzdGVuZXIiLCJjb21wZXRpdG9yTW91c2VPdmVyIiwiZXZlbnQiLCJjbGFzc05hbWUiLCJ0YXJnZXQiLCJkYXRhc2V0IiwiY29tcGV0aXRvcklkIiwiQXJyYXkiLCJmcm9tIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50c0J5Q2xhc3NOYW1lIiwiZm9yRWFjaCIsIml0ZW0iLCJjbGFzc0xpc3QiLCJhZGQiLCJjb21wZXRpdG9yTW91c2VMZWF2ZSIsInJlbW92ZSIsImNhbGN1bGF0ZVByb2dyZXNzIiwidG91cm5hbWVudCIsInRvdGFsR2FtZXMiLCJzaXplIiwiZmluaXNoZWRHYW1lcyIsImkiLCJtYXRjaGVzIiwibWF0Y2hfc3RhdHVzIiwicmVuZGVyUHJvZ3Jlc3MiLCJmbG9hdCIsInJlbmRlckRyb3BEb3duIiwic3BvdF9pZCIsImNvbnRlbnQiLCJpc19maXJzdF9yb3VuZCIsIm9uZV9jb21wZXRpdG9yX2lkIiwidHdvX2NvbXBldGl0b3JfaWQiLCJvbmVfaWQiLCJhZHZhbmNlX3VybCIsImFkdmFuY2Vfbm9uY2UiLCJyZXBsYWNlX3VybCIsInJlcGxhY2Vfbm9uY2UiLCJsYW5ndWFnZSIsImNvbXBldGl0b3JzIiwidHdvX2lkIiwiY2xlYXJfdXJsIiwiY2xlYXJfbm9uY2UiLCJyZW5kZXJNYXRjaCIsImZsb3ciLCJjYW5fZWRpdF9tYXRjaGVzIiwidW5kZWNpZGVkIiwibGVuZ3RoIiwib25lX25hbWUiLCJjb21wZXRpdG9yX3VybF9wcmVmaXgiLCJvbmVfY29tcGV0aXRvcl90eXBlIiwicm91dGVzIiwicGxheWVycyIsInRlYW1zIiwib25lX3VybCIsInR3b19uYW1lIiwidHdvX2NvbXBldGl0b3JfdHlwZSIsInR3b191cmwiLCJyZW5kZXJCcmFja2V0cyIsImNvbnRhaW5lciIsIm51bWJlck9mR2FtZXMiLCJtYXRjaFBhZGRpbmdDb3VudCIsInRyblRvdGFsUm91bmRzIiwicm91bmRzIiwic3BvdCIsInN1bU9mR2FtZXMiLCJyb3VuZCIsIk1hdGgiLCJjZWlsIiwicG93IiwicGFkZGluZyIsIndpbm5lciIsIm9uZV9yZXN1bHQiLCJpbm5lckhUTUwiLCJ0b3VybmFtZW50SWQiLCJwYXJzZUludCIsInRvdXJuYW1lbnRTaXplIiwiUHJvbWlzZSIsImFsbCIsIl9yZWYiLCJfcmVmMiIsIl9zbGljZWRUb0FycmF5IiwibG9nIiwiY29uc29sZSIsInJlZHVjZSIsImNvbXBldGl0b3IiLCJfZW1iZWRkZWQiLCJjb21wZXRpdG9yX2lkIiwibWF0Y2giXSwic291cmNlUm9vdCI6IiJ9