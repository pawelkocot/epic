import React from 'react'
import {Grid, Row, Col} from 'react-bootstrap'
import Navigation from './Navigation'

import 'bootstrap/dist/css/bootstrap.min.css'

export default ({children}) => (
  <div>
    <Navigation />
    <Grid bsClass="container">
      <Row>
        <Col xs={12}>
          {children}
        </Col>
      </Row>
    </Grid>
  </div>
)
