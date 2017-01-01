import React from 'react';
import {Router, Route, IndexRoute} from 'react-router';

import AppWrapper from './AppWrapper';
import EventsContainer from './Events/EventsContainer';
import AddEventContainer from './AddEvent/AddEventContainer';

export default ({history, children}) => (
  <Router history={history}>
    <Route path={'/'} component={AppWrapper}>
      <IndexRoute component={EventsContainer}/>
      <Route path={'/add-event'} component={AddEventContainer} />
    </Route>
  </Router>
);
