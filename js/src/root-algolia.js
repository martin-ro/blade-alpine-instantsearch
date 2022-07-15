import algoliasearch from 'algoliasearch/lite';
// import instantsearch from 'instantsearch.js';
import instantsearch from 'instantsearch.js/es';
import * as connectors from 'instantsearch.js/es/connectors';
import factory from './factory.js';

export default factory(algoliasearch, instantsearch, connectors);
