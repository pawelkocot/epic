import React from 'react';
import {Navbar, Nav, NavItem} from 'react-bootstrap';
import {IndexLinkContainer, LinkContainer} from 'react-router-bootstrap';

export default ({children}) => (
  <Navbar>
    <Nav>
      <IndexLinkContainer to="/">
        <NavItem eventKey={1}>Events</NavItem>
      </IndexLinkContainer>
      <LinkContainer to="/add-event">
        <NavItem eventKey={2}>Add event</NavItem>
      </LinkContainer>
    </Nav>
  </Navbar>
);
