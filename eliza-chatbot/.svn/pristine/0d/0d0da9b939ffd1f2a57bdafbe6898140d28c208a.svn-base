"""Chat with ELIZA in a console

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

import sys
from .identities import eliza

USERNAME_IN_CHAT = "YOU"

def chat(log_info=None, log_debug=None):
    """Allows user interaction in console with a single chatbot (agent) in a loop:
    - start session with empty ("") message sent to the agent
    - read user message from console
    - get agent's response
    - write agent's response to console
    - exit if user presses enter without any input (message length is 0)
    """

    agent = eliza.create(log_info=log_info, log_debug=log_debug)

    print("\n<press enter with no message to exit>")
    print(f"{agent.name()}: {agent('')}")
    print(f"{USERNAME_IN_CHAT}: ")
    msg = sys.stdin.readline().strip()
    while msg:
        print(f"{agent.name()}: {agent(msg)}")
        print(f"{USERNAME_IN_CHAT}: ")
        msg = sys.stdin.readline().strip()


if __name__ == "__main__":
    chat()
