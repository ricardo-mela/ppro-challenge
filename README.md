# ppro-challenge

## Build instructions

The Wordpress container is built and deployed by a Jenkins job. Building instructions are on the `build-steps.sh` file, which is used by the deployment process.

To build and deploy the image, access to ECR and to the EKS cluster is needed.

The Jenkins container is set up with that access, and also has the following capabilities:

* Access to the host's `docker.sock` to build the images and push them to ECR
* Access to `kubectl` and `aws-iam-authenticator` to interact with the cluster control plane

The EKS cluster was created using `eksctl`

`eksctl create cluster --name ppro --version 1.12 --nodegroup-name standard-workers --node-type t3.medium --nodes 1 --nodes-min 1 --nodes-max 4 --node-ami auto`

There is a CloudFormation template named `rds-and-efs.yaml` that can create the underlying RDS and EFS needed for WordPress. I am using the same EFS for Jenkins as the persistent storage as well.

Additional cluster configuration and Kubernetes deployment manifests are in the k8s/ folder.

### Useful commands

`sudo docker build . | tail -n 1 | cut -d' ' -f3 | xargs sudo docker run -p 80:80` to build and run my containers for testing purposes

`sudo docker exec -it $(sudo docker container ls | tail -n 1 | awk ' { print $NF } ') /bin/bash` to log into my container

`eksctl` is great to set up EKS :)
