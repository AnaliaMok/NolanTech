```graphql
query drupalTutorials {
  dt: allDrupalTutorials {
    edges {
      node {
        id
        title
        slug
      }
    }
  }
}
```