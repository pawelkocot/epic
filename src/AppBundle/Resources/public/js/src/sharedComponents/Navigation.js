import React from 'react';
import {Navbar, Nav, NavItem} from 'react-bootstrap'
import {IndexLinkContainer, LinkContainer} from 'react-router-bootstrap'

export default ({children}) => (
  <Navbar>
    <Nav>
      <IndexLinkContainer to="/">
        <NavItem eventKey={1}>Home</NavItem>
      </IndexLinkContainer>
      <LinkContainer to="/second">
        <NavItem eventKey={2}>Second</NavItem>
      </LinkContainer>
    </Nav>
  </Navbar>
)
