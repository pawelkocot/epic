import React from 'react';
import {Router, Route, IndexRoute} from 'react-router';

import AppWrapper from './AppWrapper';
import EventsContainer from './Events/EventsContainer';
import AddEventContainer from './AddEvent/AddEventContainer';
import Event from './Event/Event';
import EmailsContainer from './Emails/EmailsContainer';

export default ({history, children}) => (
  <Router history={history}>
    <Route path={'/'} component={AppWrapper}>
      <IndexRoute component={EventsContainer}/>
      <Route path={'/add-event'} component={AddEventContainer} />
      <Route path={'/event/:id'} component={Event} />
      <Route path={'/emails'} component={EmailsContainer} />
    </Route>
  </Router>
);
