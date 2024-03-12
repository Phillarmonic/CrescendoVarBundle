# CrescendoVarBundle
Elevate Your Code to a Symphony of Efficiency with CrescendoVarBundle: Where Every Variable Plays its Part Perfectly.

## **Overview**

The **`phillarmonic/crescendo-var-bundle`** is a Symfony Bundle designed to enhance your development workflow by simplifying environment variable manipulation. With its intuitive features, developers can effortlessly convert environment variable strings into integers or booleans, as well as transform a single environment variable into an array.

This document provides a comprehensive guide on how to integrate and utilize the CrescendoVarBundle in your projects.

This is particularly useful when you need values of a specific type, but your workflow necessitates the use of strings to set your environment variables. An example of this is an ArgoCD YAML file, which requires all values to be strings.

## **Features**

- **Automatic Type Conversion:** Easily convert string environment variables to integers (**`int`**) or booleans (**`bool`**) to ensure the correct data types are used in your application.
- **Array Transformation:** Split a single environment variable into an array, allowing for more complex configurations that can be dynamically adjusted via environment variables.
- **Edge Case Handling:** Specifically designed to manage edge cases in environment variable processing, ensuring robust and error-free application configuration.

## **Installation**

To install the CrescendoVarBundle, run the following command in your project directory:

```bash
composer require phillarmonic/crescendo-var-bundle
```

Ensure that your project's **`composer.json`** is updated and that the package is installed successfully.

## **Configuration**

After installation, configure the bundle by adding it to your application's bundle configuration. This process may vary depending on the framework or platform you are using. Typically, it involves registering the bundle in a configuration file or through an application's bundle registration system.

## **Usage**

CrescendoVarBundle simplifies the usage of environment variables by providing special processors to handle common use cases. Below are examples of how to use these processors in your application:

### **Converting String to Integer**

Use the **`tryint`** processor to convert an environment variable value to an integer. This is particularly useful for ports and other numerical configurations.

```yaml
parameters:
  database_port: '%env(tryint:DATABASE_PORT)%'
```

### **Converting String to Boolean**

The **`trybool`** processor converts an environment variable value to a boolean. This is ideal for feature flags and other boolean-based configurations.

```yaml
parameters:
  second_level_cache_enabled: '%env(trybool:SECOND_LEVEL_CACHE_ENABLED)%'
```

### **Explode Environment Variable into an Array**

The **`explode`** processor splits a single environment variable into an array based on a delimiter (default is coma **`,`**). This is useful for lists of hosts, tags, or any multivalued configuration.

```yaml
parameters:
  redis_cluster_hosts: '%env(explode:REDIS_CLUSTER_HOSTS)%'
  # Setting up your own delimiter
  redis_cluster_hosts: '%env(explode_;:REDIS_CLUSTER_HOSTS)%'
```

## **Support and Contribution**

For issues, questions, or contributions, please visit the project's GitHub repository. Our community is eager to help and welcomes contributions from developers at all skill levels.

---
