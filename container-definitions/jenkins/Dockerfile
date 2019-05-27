FROM jenkins/jenkins:lts
USER root
RUN apt-get update && apt-get install -y  apt-transport-https ca-certificates  curl  gnupg2 software-properties-common
RUN curl -fsSL https://download.docker.com/linux/debian/gpg | apt-key add
RUN add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian  $(lsb_release -cs) stable"
RUN apt-get update && apt-get install -y docker-ce \
        python3 \
        python3-pip \
        python3-setuptools \
        groff \
        less \
    && pip3 install --upgrade pip \
    && apt-get clean
RUN pip3 --no-cache-dir install --upgrade awscli
COPY ./files/sudoers /etc/sudoers
COPY ./files/kubectl /usr/bin/kubectl
COPY ./files/aws-iam-authenticator /usr/bin/aws-iam-authenticator
COPY ./files/config /tmp/config
RUN chown jenkins.jenkins /tmp/config
USER jenkins
ENV KUBECONFIG=/tmp/config
