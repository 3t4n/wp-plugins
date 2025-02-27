/**
 * @preserve Copyright 2024 Pine Grove Software, LLC
 * AccurateCalculators.com
 * pine-grove.com
 * stringBuffer.gpl.js
 */


/**
 * StringBuffer is a wrapper around an array.
 */
export class StringBuffer {
	constructor () {
		this.buffer = [];
	}

	/**
	 * Appends a string to the buffer.
	 * @param {string} string - The string to append.
	 * @returns {StringBuffer} The instance of StringBuffer for chaining.
	 */
	append (string) {
		this.buffer.push(string);
		return this;
	}

	/**
	 * Converts the buffer to a single string.
	 * @returns {string} The concatenated string from the buffer.
	 */
	toString () {
		return this.buffer.join('');
	}
}
