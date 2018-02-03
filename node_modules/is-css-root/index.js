'use strict'

module.exports = function isCssRoot (selector) {
  if (typeof selector !== 'string') {
    throw new TypeError('is-css-root expected a string')
  }

  return selector === ':root'
}
