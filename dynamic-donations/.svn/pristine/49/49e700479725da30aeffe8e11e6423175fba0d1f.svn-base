import React from 'react';
import { HashRouter, Switch, Route } from 'react-router-dom';
import { private_routes, public_routes } from './routes';
import { PrivateRoute, PublicRoute } from './routes/components';
import { NoMatch } from './pages';

export default function App() {
  return (
    <HashRouter>
      <Switch>
        {
          private_routes.map((route, i) => <PrivateRoute key={i} {...route} />)
        }
        {
          public_routes.map((route, i) => <PublicRoute key={i} {...route} />)
        }

        <Route path="*" component={NoMatch} />
      </Switch>
    </HashRouter>
  );
}
