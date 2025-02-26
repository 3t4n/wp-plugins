"""Session management

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

class MultiAgentSession:
    """Allows interaction between multiple agents in a loop:
    - first agent gets empty ("") message
    - each agent response is passed as input message to next agent
    - last agent response is passed as input message to first agent
    """

    def __init__(self, *agents):
        self._agents = agents
        self._activeAgent = 0
        self._message = ""

    def next(self):
        self._message = self._agents[self._activeAgent](self._message)
        if self._message:
            # Normalization for MicroPython's re module which lacks IGNORECASE feature
            self._message = self._message.upper()
        result = (self._agents[self._activeAgent].name(), self._message)
        self._activeAgent = (self._activeAgent + 1) % len(self._agents)

        return result
