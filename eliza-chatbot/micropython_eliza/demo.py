"""Demonstration of a conversation with ELIZA

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

from .session import MultiAgentSession
from .identities import eliza, eliza_demo

def demo(_print=print, log_info=None, log_debug=None):
    session = MultiAgentSession(
        eliza.create(name="ELIZA", log_info=log_info, log_debug=log_debug),
        eliza_demo.create(name="CLIENT")
    )

    idx = 0
    while True:
        if idx % 2 == 0:
            _print(f"****** ROUND #{int(idx/2)+1} ******")
        name, msg = session.next()
        if msg == None:
            _print(f"{name}: (END)")
            break

        _print(f"{name}: {msg}")
        idx += 1

if __name__ == "__main__":
    demo()
