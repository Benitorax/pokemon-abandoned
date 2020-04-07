import ErrorBoundary from '../Error/ErrorBoundary';
import Homepage from './App/Homepage';

import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useRouteMatch,
  useParams
} from "react-router-dom";

export default function Pokemon() {
  return (
        <Router>
            <ErrorBoundary>
            <nav className="navbar is-primary">
                <div className="container">
                    <Link className="navbar-item" to="/">Home</Link>
                    <Link className="navbar-item" to="/">Home bis</Link>
                </div>
            </nav>

            <section className="section">
                <div className="container">
                    <Switch>
                        <Route>
                            <Homepage/>
                        </Route>
                    </Switch>
                </div>
            </section>
            </ErrorBoundary>
      </Router>
  );
}

