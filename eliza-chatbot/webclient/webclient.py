"""Script for running ELIZA in the browser

Copyright (c) 2017-2023, Szymon Jessa

This file is part of ELIZA Chatbot.

ELIZA Chatbot is free software: you can redistribute it and/or modify it under the terms of
the GNU General Public License as published by the Free Software Foundation,
either version 3 of the License, or (at your option) any later version.

ELIZA Chatbot is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with ELIZA Chatbot.
If not, see <https://www.gnu.org/licenses/>.
"""
import js
from pyscript import display
from pyodide.ffi import create_proxy
from micropython_eliza import eliza
from micropython_eliza.demo import demo as demo_chat

USERNAME = "YOU"
CHAT_WINDOW = "chat-window"
INPUT_ID = "user-input"

class LogLevel:
    CRITICAL = 1
    INFO = 2
    DEBUG = 3

class Logger:

    def __init__(self, target=CHAT_WINDOW, level=LogLevel.CRITICAL):
        self._target = target
        self._level = level

    def setLevel(self, level):
        self._level = level

    def _stderr(self, text):
        el = js.document.createElement('p')
        el.innerText = f"{text}"
        js.document.getElementById(self._target).append(el)

    def debug(self, msg, *args):
        if self._level >= LogLevel.DEBUG:
            self._stderr(msg % args)

    def info(self, msg, *args):
        if self._level >= LogLevel.INFO:
            self._stderr(msg % args)

    def critical(self, msg, *args):
        if self._level >= LogLevel.CRITICAL:
            self._stderr(msg % args)

    def message(self, msg, *args):
        display(msg % args, target=self._target)

    def flush(self):
        pass


def scrollToBottom():
    el = js.document.getElementById(CHAT_WINDOW)
    el.scrollTop = el.scrollHeight

def start(evt=None):
    global eliza_agent, logger
    js.document.getElementById(CHAT_WINDOW).innerHTML = ''
    eliza_agent = eliza.create(log_info=logger.info, log_debug=logger.debug)
    logger.message(f"{eliza_agent.name()}: {eliza_agent.start()}")
    js.document.getElementById(INPUT_ID).focus()

def demo(evt=None):
    global logger
    js.document.getElementById(CHAT_WINDOW).innerHTML = ''
    demo_chat(_print=logger.message, log_info=logger.info, log_debug=logger.debug)
    scrollToBottom()

def set_logging(evt=None):
    global logger

    levels = {
        "CRITICAL": LogLevel.CRITICAL,
        "INFO": LogLevel.INFO,
        "DEBUG": LogLevel.DEBUG,
    }

    level = js.document.querySelector("[name='output-level']:checked").value
    if level in levels:
        logger.setLevel(levels[level])


def get_answer(evt=None):
    global eliza_agent, logger

    user_msg = js.document.getElementById(INPUT_ID).value.strip()
    if len(user_msg) > 0:
        user_msg = user_msg.upper()
        logger.message(f"{USERNAME}: {user_msg}")
        answer = eliza_agent(user_msg)
        logger.message(f"{eliza_agent.name()}: {answer}")
        js.document.getElementById(INPUT_ID).value = ''

    scrollToBottom()
    js.document.getElementById(INPUT_ID).focus()


def on_user_input_keypress(evt):
    get_answer()


def set_event_listeners():
    js.document.getElementById(INPUT_ID).addEventListener(
        "submit", create_proxy(on_user_input_keypress)
    )
    js.document.getElementById("btn-demo").addEventListener("click", create_proxy(demo))
    js.document.getElementById("btn-send").addEventListener(
        "click", create_proxy(get_answer)
    )
    js.document.getElementById("btn-restart").addEventListener("click", create_proxy(start))
    js.document.getElementById("output-level-critical").addEventListener(
        "change", create_proxy(set_logging)
    )
    js.document.getElementById("output-level-info").addEventListener(
        "change", create_proxy(set_logging)
    )
    js.document.getElementById("output-level-debug").addEventListener(
        "change", create_proxy(set_logging)
    )

logger = Logger(CHAT_WINDOW)
start()
set_event_listeners()
