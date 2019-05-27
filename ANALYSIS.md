# Analysis

## Scalability

The WordPress pod can be scaled pretty easily by updating the deployment: more worker nodes can be added manually at the beginning, but implementing [HPA or CA](https://eksworkshop.com/scaling/) can be a good plan for futureproofing.

The deployment is already accessible via an Elastic Load Balancer, so that should be taking care of the load balancing. 

Using an RDS database and EFS for shared storage for static content allows the number of pods to grow without having to worry about shared resources. Session handling might be nice to have in case it is needed, and S3-based static content could be a way to improve access time in the future.

## Deployment solution

The current git repo approach does not have the `kubeconfig` file available as it is a security risk: The proper approach should be to use kubernetes secrets or another way of sharing the configuration. 

The `wp-config.php` file could be done in the same way: the RDS database is private and access is limited to the workers security group, so it should not be a big issue, but a different approach would be needed for production.

All other security credentials are handled via IAM rolesor Security Groups, so there are no functional accounts or passwords used.

I also believe that the Jenkins pod should run in a separate worker node, so as to limit the permissions it needs in the k8s API level to a specific group of nodes. I could run Jenkins and other non-productive tasks that need privileged access, like monitoring systems, in such nodes.
